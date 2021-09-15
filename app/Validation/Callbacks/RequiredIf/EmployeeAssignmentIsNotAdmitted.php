<?php

namespace App\Validation\Callbacks\RequiredIf;

use App\Models\Hrm\EmployeeAssignment;

class EmployeeAssignmentIsNotAdmittedCallback
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public static function run($request)
    {
        $employeeAssignment = EmployeeAssignment::findOrFail(
            $request->input('id')
        );

        return $employeeAssignment->hasntBeenAdmitted();
    }
}
