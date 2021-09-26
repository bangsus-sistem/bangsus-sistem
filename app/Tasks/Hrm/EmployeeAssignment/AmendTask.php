<?php

namespace App\Tasks\Hrm\EmployeeAssignment;

use Bsb\Foundation\Task;
use App\Models\Hrm\EmployeeAssignment;

class AmendTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $employeeAssignment = EmployeeAssignment::findOrFail(
            $request->input('id')
        );
        $this->transaction(
            function () use ($request, $employeeAssignment) {
                if ($employeeAssignment->hasntBeenAdmitted()) {
                    $employeeAssignment->branch_id = $request->input('branch_id');
                    $employeeAssignment->first_job_title_id = $request->input('first_job_title_id');
                    $employeeAssignment->start_date = $request->input('start_date');
                }
                $employeeAssignment->end_date = $request->input('end_date');
                $employeeAssignment->base_salary = $request->input('base_salary');
                $employeeAssignment->description = $request->input('description');
                $employeeAssignment->note = $request->input('note');
                $employeeAssignment->save();
            }
        );

        return $employeeAssignment;
    }
}
