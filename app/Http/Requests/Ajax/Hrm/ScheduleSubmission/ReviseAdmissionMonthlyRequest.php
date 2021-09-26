<?php

namespace App\Http\Requests\Ajax\Hrm\ScheduleSubmission;

use App\Http\Requests\FeatureRequest;
use Illuminate\Validation\Rule;

class ReviseAdmissionMonthlyRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'schedule_submission',
        'action' => 'admit',
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'month' => [
                'required'
            ]
        ];
    }
}
