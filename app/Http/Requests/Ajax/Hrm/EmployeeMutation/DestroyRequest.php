<?php

namespace App\Http\Requests\Ajax\Hrm\EmployeeMutation;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Hrm\EmployeeMutation;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'employee_mutation',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return EmployeeMutation::class;
    }
}
