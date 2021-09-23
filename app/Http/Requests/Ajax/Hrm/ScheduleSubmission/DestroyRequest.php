<?php

namespace App\Http\Requests\Ajax\Hrm\ScheduleSubmission;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Hrm\ScheduleSubmission;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'schedule_submission',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return ScheduleSubmission::class;
    }
}
