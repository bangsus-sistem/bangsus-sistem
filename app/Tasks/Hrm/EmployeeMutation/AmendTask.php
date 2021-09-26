<?php

namespace App\Tasks\Hrm\EmployeeMutation;

use Bsb\Foundation\Task;
use App\Models\Hrm\EmployeeMutation;

class AmendTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $employeeMutation = EmployeeMutation::findOrFail(
            $request->input('id')
        );
        $this->transaction(
            function () use ($request, $employeeMutation) {
                if ($employeeMutation->hasntBeenAdmitted()) {
                    $employeeMutation->job_title_id = $request->input('job_title_id');
                    $employeeMutation->start_date = $request->input('start_date');
                }
                $employeeMutation->end_date = $request->input('end_date');
                $employeeMutation->description = $request->input('description');
                $employeeMutation->note = $request->input('note');
                $employeeMutation->save();
            }
        );

        return $employeeMutation;
    }
}
