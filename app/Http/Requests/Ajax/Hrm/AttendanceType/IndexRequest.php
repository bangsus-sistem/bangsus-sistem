<?php

namespace App\Http\Requests\Ajax\Hrm\AttendanceType;

use App\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'attendance_type',
        'action' => 'index',
    ];
}
