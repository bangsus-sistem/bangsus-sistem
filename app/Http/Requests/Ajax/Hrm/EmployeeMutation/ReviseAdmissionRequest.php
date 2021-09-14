<?php

namespace App\Http\Requests\Ajax\Hrm\EmployeeMutation;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Hrm\EmployeeMutation;

class ReviseAdmissionRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'employee_mutation',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return EmployeeMutation::class;
    }
}
