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
        $year = explode('-', $request->query('year'))[0];
        $branches = Branch::get();

        $branches->each(function ($branch) use (&$container, $month, $year) {
            $data = [];

            $data[] = ['Cabang', $branch->code, $branch->name];
            $data[] = ['Bulan', $month];
            $data[] = ['Tahun', $year];

            $data[] = [];
            $data[] = [];

            $data[] = ['No.', 'Nama Karyawan', 'Absen Masuk', 'Off', 'Denda Terlambat', 'Denda Umum', 'Denda Bahan'];

            $employees = Employee::whereHas('employeeAssignments', function ($query) use ($branch) {
                return $query->where('branch_id', $branch->id);
            })
                ->whereHas('attendances', function ($query) use ($month, $year) {
                    return $query->whereMonth('attendance_in_datetime', '=', $month)->whereYear('attendance_in_datetime', '=', $year);
                })
                ->get();

            $count = $employees->count();
            $count = $count == 0 ? 1 : $count;

            $commonPenalty = CommonPenalty::getPenalty($month, $year, $branch->id) / $count;
            $materialPenalty = MaterialPenalty::getPenalty($month, $year, $branch->id) / $count;

            $employees->each(function ($employee) use (&$data, $branch, $commonPenalty, $materialPenalty) {
                $data[] = [
                    '',
                    $employee->full_name,
                    '',
                    $branch->off,
                    '0', // Attendance::getLatePenalty($employee->id, $branch->id, $month, $year),
                    $commonPenalty,
                    $materialPenalty,
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
