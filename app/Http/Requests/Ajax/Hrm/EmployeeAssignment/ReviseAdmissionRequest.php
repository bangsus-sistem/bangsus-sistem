<?php

namespace App\Http\Requests\Ajax\Hrm\EmployeeAssignment;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Hrm\EmployeeAssignment;

class ReviseAdmissionRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'employee_assignment',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return EmployeeAssignment::class;
    }
}
