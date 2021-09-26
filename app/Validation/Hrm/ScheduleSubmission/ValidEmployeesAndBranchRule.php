<?php

namespace App\Validation\Hrm\ScheduleSubmission;

use Bsb\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Hrm\EmployeeAssignment;

class ValidEmployeesAndBranchRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $employeeAssignment = EmployeeAssignment::where(
            $this->buildWhere()
                ->with($this->request)
                ->usage('input')
                ->index('employee_ids')->column('employee_id')->mode('id_array')
                ->index('branch_id')->mode('id')
                ->done()
        )->get();

        if (count($employeeAssignment->toArray()) != count($value)) {
            $this->setMessage('Karyawan dan Cabang tidak valid.');
            return false;
        }

        return true;
    }
}
