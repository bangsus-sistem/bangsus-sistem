<?php

namespace App\Tasks\Hrm\EmployeeMutation;

use Bsb\Foundation\Task;
use App\Models\Hrm\EmployeeMutation;

class DestroyTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function handle($request)
    {
        $employeeMutation = EmployeeMutation::findOrFail(
            $request->input('id')
        );
        $this->transaction(fn () => $employeeMutation->delete());
    }
}
