<?php

namespace App\Tasks\Hrm\EmployeeAssignment;

use Bsb\Foundation\Task;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $employeeAssignment = new EmployeeAssignment;
        $this->transaction(
            function () use ($request, $employeeAssignment) {
                $employeeAssignment->employee_id = $request->input('employee_id');
                $employeeAssignment->branch_id = $request->input('branch_id');
                $employeeAssignment->first_job_title_id = $request->input('first_job_title_id');
                $employeeAssignment->start_date = $request->input('start_date');
                $employeeAssignment->end_date = $request->input('end_date');
                $employeeAssignment->description = $request->input('description');
                $employeeAssignment->note = $request->input('note');
                $employeeAssignment->save();

                if (bsbf_auth('feature', ['module' => 'employee_assignment', 'action' => 'admit'])) {
                    $employeeAssignment->admit();
                }
            }
        );

        return $employeeAssignment;
    }
}
