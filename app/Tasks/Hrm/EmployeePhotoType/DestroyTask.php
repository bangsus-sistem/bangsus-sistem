<?php

namespace App\Tasks\Hrm\EmployeePhotoType;

use Bsb\Foundation\Task;
use App\Models\Hrm\EmployeePhotoType;

class DestroyTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function handle($request)
    {
        $employeePhotoType = EmployeePhotoType::findOrFail($request->input('id'));
        $this->transaction(fn () => $employeePhotoType->delete());
    }
}
