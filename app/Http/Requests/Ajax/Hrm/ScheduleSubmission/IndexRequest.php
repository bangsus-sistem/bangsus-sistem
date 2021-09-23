<?php

namespace App\Http\Requests\Ajax\Hrm\ScheduleSubmission;

use App\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'schedule_submission',
        'action' => 'index',
    ];
}
