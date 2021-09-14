<?php

namespace App\Http\Requests\Ajax\Hrm\Employee;

use App\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'employee',
        'action' => 'index',
    ];
}
