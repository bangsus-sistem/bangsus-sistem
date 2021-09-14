<?php

namespace App\Tasks\Hrm\EmployeeAssignment;

use Bsb\Foundation\Task;

class ReviseAdmissionTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $state = true)
    {
        $employeeAssignment = EmployeeAssignment::findOrFail(
            $request->input('id')
        );
        $this->transaction(
            function () use ($request, $employeeAssignment, $state) {
                $employeeAssignment->admit();
            }
        );

        return $employeeAssignment;
    }
}
