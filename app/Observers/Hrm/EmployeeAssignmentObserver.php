<?php

namespace App\Observers\Hrm;

use Bsb\Foundation\Observer;
use App\Models\Hrm\EmployeeMutation;

class EmployeeAssignmentObserver extends Observer
{
    /**
     * @param  \Illuminate\Database\Eloquent\Model  $employee
     * @return void
     */
    public static function admitting($employeeAssignment)
    {
        $employeeMutation = new EmployeeMutation;
        $employeeMutation->employee_assignment_id = $employeeAssignment->id;
        $employeeMutation->job_title_id = $employeeAssignment->first_job_title_id;
        $employeeMutation->start_date = $employeeAssignment->start_date;
        $employeeMutation->description = '';
        $employeeMutation->note = '';
        $employeeMutation->save();
        $employeeMutation->admit();

        return true;
    }
}
