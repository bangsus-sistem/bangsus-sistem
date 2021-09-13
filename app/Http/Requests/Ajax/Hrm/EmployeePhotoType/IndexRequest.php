<?php

namespace App\Http\Requests\Ajax\Hrm\EmployeePhotoType;

use App\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'employee_photo_type',
        'action' => 'index',
    ];
}
