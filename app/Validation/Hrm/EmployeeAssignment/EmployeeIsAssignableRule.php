<?php

namespace Waffleboss\Library\Validation\Hrm\EmployeeAssignment;

use Waffleboss\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Hrm\Employee;

class EmployeeIsAssignableRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $employee = Employee::findOrFail($this->request->input('employee_id'));

        $this->setMessage('Karyawan belum disetujui.');
        return $employee->hasBeenAdmitted();
    }
}
