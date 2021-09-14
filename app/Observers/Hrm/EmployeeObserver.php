<?php

namespace App\Observers\Hrm;

use Bsb\Foundation\Observer;
use App\Models\Hrm\EmployeeAssignment;

class EmployeeObserver extends Observer
{
    /**
     * @param  \Illuminate\Database\Eloquent\Model  $employee
     * @return void
     */
    public static function admitting($employee)
    {
        $employee->code = $employee->generateCode();
        $employeeAssignment = new EmployeeAssignment;
        $employeeAssignment->employee_id = $employee->id;
        $employeeAssignment->branch_id = $employee->first_branch_id;
        $employeeAssignment->first_job_title_id = $employee->first_job_title_id;
        $employeeAssignment->start_date = $employee->start_date;
        $employeeAssignment->description = '';
        $employeeAssignment->note = '';
        $employeeAssignment->save();
        $employeeAssignment->admit();

        return true;
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Model  $employee
     * @return void
     */
    public function deleting($employee)
    {
        $employee->code = null;
        $employee->nik = null;
        $employee->saveQuietly();
    }
}
