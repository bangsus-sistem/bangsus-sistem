<?php

namespace App\Tasks\Hrm\Employee;

use Bsb\Foundation\Task;
use App\Models\Hrm\Employee;

class DestroyTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function handle($request)
    {
        $employee = Employee::findOrFail($request->input('id'));
        $this->transaction(fn () => $employee->delete());
    }
}
