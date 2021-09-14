<?php

namespace App\Tasks\Hrm\EmployeeAssignment;

use Bsb\Foundation\Task;
use App\Models\Hrm\EmployeeAssignment;

class DestroyTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function handle($request)
    {
        $employeeAssignment = EmployeeAssignment::findOrFail(
            $request->input('id')
        );
        $this->transaction(fn () => $employeeAssignment->delete());
    }
}
