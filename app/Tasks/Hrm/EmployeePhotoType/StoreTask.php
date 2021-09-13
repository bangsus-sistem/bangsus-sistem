<?php

namespace App\Tasks\Hrm\EmployeePhotoType;

use Bsb\Foundation\Task;
use App\Models\Hrm\EmployeePhotoType;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $employeePhotoType = new EmployeePhotoType;
        $this->transaction(
            function () use ($request, $employeePhotoType) {
                $employeePhotoType->code = $request->input('code');
                $employeePhotoType->name = $request->input('name');
                $employeePhotoType->active = true;
                $employeePhotoType->required = $request->boolean('required');
                $employeePhotoType->description = $request->input('description');
                $employeePhotoType->note = $request->input('note');
                $employeePhotoType->save();
            }
        );

        return $employeePhotoType;
    }
}
