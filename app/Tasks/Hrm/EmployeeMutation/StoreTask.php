<?php

namespace App\Tasks\Hrm\EmployeeMutation;

use Bsb\Foundation\Task;
use App\Models\Hrm\EmployeeMutation;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $employeeMutation = new EmployeeMutation;
        $this->transaction(
            function () use ($request, $employeeMutation) {
                $employeeMutation->employee_assignment_id = $request->input('employee_assignment_id');
                $employeeMutation->job_title_id = $request->input('job_title_id');
                $employeeMutation->start_date = $request->input('start_date');
                $employeeMutation->end_date = $request->input('end_date');
                $employeeMutation->description = $request->input('description');
                $employeeMutation->note = $request->input('note');
                $employeeMutation->save();

                if (bsbf_auth('feature', ['module' => 'employee_mutation', 'action' => 'admit'])) {
                    $employeeMutation->admit();
                }
            }
        );

        return $employeeMutation;
    }
}
