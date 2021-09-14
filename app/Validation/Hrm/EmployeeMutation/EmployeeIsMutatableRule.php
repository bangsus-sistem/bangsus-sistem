<?php

namespace App\Validation\Hrm\EmployeeMutation;

use Bsb\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Hrm\EmployeeAssignment;

class EmployeeIsMutatableRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $employeeAssignment = EmployeeAssignment::findOrFail(
            $this->request->input('employee_assignment_id')
        );

        $this->setMessage('Tugas Karyawan belum disetujui.');
        return $employeeAssignment->hasBeenAdmitted();
    }
}
