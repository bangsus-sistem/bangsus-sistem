<?php

namespace App\Http\Requests\Ajax\Hrm\EmployeePhotoType;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Hrm\EmployeePhotoType;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'employee_photo_type',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return EmployeePhotoType::class;
    }
}
