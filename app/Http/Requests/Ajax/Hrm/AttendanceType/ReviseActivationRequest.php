<?php

namespace App\Http\Requests\Ajax\Hrm\AttendanceType;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Hrm\AttendanceType;

class ReviseActivationRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'attendance_type',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return AttendanceType::class;
    }
}
