<?php

namespace App\Http\Requests\Ajax\Hrm\EmployeeAssignment;

use App\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'employee_assignment',
        'action' => 'read',
    ];
}
