<?php

namespace App\Http\Requests\Ajax\Hrm\Attendance;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Hrm\Attendance;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'attendance',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return Attendance::class;
    }
}
