<?php

namespace App\Validation\Hrm\Attendance;

use Bsb\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Hrm\EmployeeAssignment;

class ValidEmployeeAndBranchRule extends RequestRule implements Rule
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
                ->index('employee_id')->mode('id')
                ->index('branch_id')->mode('id')
                ->done()
        )->first();

        if ( ! is_null($employeeAssignment)) {
            $this->setMessage('Karyawan dan Cabang tidak valid.');
            return false;
        }

        return true;
    }
}
