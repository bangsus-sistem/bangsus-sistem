<?php

namespace App\Http\Requests\Ajax\Hrm\AttendanceType;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Hrm\AttendanceType;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'attendance_type',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return AttendanceType::class;
    }
}
