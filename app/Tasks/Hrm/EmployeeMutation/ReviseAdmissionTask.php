<?php

namespace App\Tasks\Hrm\EmployeeMutation;

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
        $employeeMutation = EmployeeMutation::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $employeeMutation, $state) {
                $employeeMutation->admit();
            }
        );

        return $employeeMutation;
    }
}
