<?php

namespace App\Http\Requests\Ajax\Hrm\EmployeeMutation;

use App\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'employee_mutation',
        'action' => 'index',
    ];
}
