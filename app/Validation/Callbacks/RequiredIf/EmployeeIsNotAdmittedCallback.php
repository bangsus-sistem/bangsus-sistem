<?php

namespace App\Validation\Callbacks\RequiredIf;

use App\Models\Hrm\Employee;

class EmployeeIsNotAdmittedCallback
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public static function run($request)
    {
        $employee = Employee::findOrFail($request->input('id'));

        return $employee->hasntBeenAdmitted();
    }
}
