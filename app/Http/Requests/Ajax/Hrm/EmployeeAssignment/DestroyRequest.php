<?php

namespace App\Http\Requests\Ajax\Hrm\EmployeeAssignment;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Hrm\EmployeeAssignment;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'employee_assignment',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return EmployeeAssignment::class;
    }
}
