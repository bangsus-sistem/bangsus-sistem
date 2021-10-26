<?php

namespace App\Http\Controllers\Ajax\Report;

use Bsb\Foundation\Http\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\System\Branch;
use App\Models\Hrm\Employee;
use App\Models\Penalty\{
    CommonPenalty,
    MaterialPenalty,
};

class SalaryController extends Controller
{
    /**
     * @param  \App\Http\Requests\Ajax\Report\Salary\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $container = [];

        $month = explode('-', $request->query('month'))[1];
        $year = explode('-', $request->query('month'))[0];
        $branches = Branch::get();

        $branches->each(function ($branch) use (&$container, $month, $year) {
            $data = [];

            $data[] = ['Cabang', $branch->code, $branch->name];
            $data[] = ['Bulan', $month];
            $data[] = ['Tahun', $year];

            $data[] = [];
            $data[] = [];

            $commonPenalty = CommonPenalty::getPenalty($month, $year, $branch->id);
            $materialPenalty = MaterialPenalty::getPenalty($month, $year, $branch->id);

            $data[] = ['Denda Umum', $commonPenalty];
            $data[] = ['Beban Denda Umum', 100];
            $data[] = ['Total Denda Umum', '=B6*B7/100'];
            $data[] = [];
            $data[] = ['Denda Bahan', $materialPenalty];
            $data[] = ['Beban Denda Bahan', 100];
            $data[] = ['Total Denda Bahan', '=B10*B11/100'];

            $data[] = [];
            $data[] = [];

            $data[] = ['No.', 'Nama Karyawan', 'Absen Masuk', 'Off', 'Total', 'Gaji Pokok', 'Gaji Diterima', 'Denda Terlambat', 'Denda Umum', 'Denda Bahan', 'Total Gaji'];

            $employees = Employee::whereHas('employeeAssignments', function ($query) use ($branch) {
                return $query->where('branch_id', $branch->id);
            })
                ->whereHas('attendances', function ($query) use ($month, $year) {
                    return $query->whereMonth('attendance_in_datetime', '=', $month)->whereYear('attendance_in_datetime', '=', $year);
                })
                ->with('attendances')
                ->get();

            $count = $employees->count();
            $count = $count == 0 ? 1 : $count;

            

            $employees->each(function ($employee, $key) use (&$data, $branch, $commonPenalty, $materialPenalty, $month, $year, $count) {
                $ordinate = $key + 16;

                $attendanceCount = $employee->attendances()->where('attendance_type_id', 1)->count();
                $baseSalary = $employee->employeeAssignments->where('branch_id', $branch->id)->first()->base_salary ?? 0;
                $baseSalary = is_null($baseSalary) ? 0 : $baseSalary;

                $attendancePenalty = 0;
                $employee->attendances()->where('attendance_type_id', 1)->each(function ($attendance) use (&$attendancePenalty) {
                    if (is_null($attendance->schedule_in_datetime)) return;
                    if (is_null($attendance->attendance_in_datetime)) return;
                    if ($attendance->attendance_in_datetime->lessThan($attendance->schedule_in_datetime)) return;

                    $penalty = $attendance->attendance_in_datetime->diffInMinutes($attendance->schedule_in_datetime);
                    $penalty = $penalty * 5000;
                    $penalty = $penalty > 25000 ? 25000 : $penalty;

                    $attendancePenalty += $penalty;
                });

                $data[] = [
                    '',
                    $employee->full_name,
                    $attendanceCount,
                    $branch->off,
                    '=C'.$ordinate.'+D'.$ordinate,
                    (string) $baseSalary,
                    '=E'.$ordinate.'*F'.$ordinate.'/30',
                    (string) $attendancePenalty,
                    '=B8/'.$count,
                    '=B12/'.$count,
                    '=G'.$ordinate.'-H'.$ordinate.'-I'.$ordinate.'-J'.$ordinate,
                ];
            });

            $container[$branch->name] = $data;
        });




        $spreadsheet = new Spreadsheet();

        foreach ($container as $key => $data) {
            try {
                $sheet = new Worksheet($spreadsheet, $key);
            } catch (\Exception $e) {
                dd($e, $key);
            }
            $sheet->fromArray($data, null, 'A1');
            $spreadsheet->addSheet($sheet);
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. urlencode('report.xlsx').'"');
        $writer->save('php://output');
    }
}
