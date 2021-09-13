<?php

namespace App\Tasks\Hrm\EmployeePhotoType;

use Bsb\Foundation\Task;
use App\Models\Hrm\EmployeePhotoType;

class AmendTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $employeePhotoType = EmployeePhotoType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $employeePhotoType) {
                $employeePhotoType->code = $request->input('code');
                $employeePhotoType->name = $request->input('name');
                $employeePhotoType->required = $request->boolean('required');
                $employeePhotoType->description = $request->input('description');
                $employeePhotoType->note = $request->input('note');
                $employeePhotoType->save();
            }
        );

        return $employeePhotoType;
    }
}
