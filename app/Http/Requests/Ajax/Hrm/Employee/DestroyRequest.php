<?php

namespace App\Http\Requests\Ajax\Hrm\Employee;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Hrm\Employee;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'employee',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return Employee::class;
    }
}
