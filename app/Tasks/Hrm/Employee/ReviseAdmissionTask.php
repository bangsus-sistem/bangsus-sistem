<?php

namespace App\Tasks\Hrm\Employee;

use Bsb\Foundation\Task;
use App\Models\Hrm\Employee;

class ReviseAdmissionTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $state = true)
    {
        $employee = Employee::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $employee, $state) {
                $employee->admit();
            }
        );

        return $employee;
    }
}
