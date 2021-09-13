<?php

namespace App\Tasks\Hrm\EmployeePhotoType;

use Bsb\Foundation\Task;
use App\Models\Hrm\EmployeePhotoType;

class ReviseActivationTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $state = true)
    {
        $employeePhotoType = EmployeePhotoType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $employeePhotoType, $state) {
                $employeePhotoType->active = $state;
                $employeePhotoType->save();
            }
        );

        return $employeePhotoType;
    }
}
