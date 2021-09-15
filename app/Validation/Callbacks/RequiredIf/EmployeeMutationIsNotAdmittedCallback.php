<?php

namespace App\Validation\Callbacks\RequiredIf;

class EmployeeMutationIsNotAdmittedCallback
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public static function run($request)
    {
        $employeeMutation = EmployeeMutation::findOrFail(
            $request->input('id')
        );

        return $employeeMutation->hasntBeenAdmitted();
    }
}
