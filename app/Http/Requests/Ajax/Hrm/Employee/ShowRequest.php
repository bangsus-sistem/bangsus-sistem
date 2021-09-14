<?php

namespace App\Http\Requests\Ajax\Hrm\Employee;

use App\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'employee',
        'action' => 'read',
    ];
}
