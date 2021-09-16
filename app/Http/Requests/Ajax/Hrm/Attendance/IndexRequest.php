<?php

namespace App\Http\Requests\Ajax\Hrm\Attendance;

use App\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'attendance',
        'action' => 'index',
    ];
}
