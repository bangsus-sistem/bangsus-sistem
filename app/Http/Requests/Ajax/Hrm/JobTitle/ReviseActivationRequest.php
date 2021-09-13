<?php

namespace App\Http\Requests\Ajax\Hrm\JobTitle;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Hrm\JobTitle;

class ReviseActivationRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'job_title',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return JobTitle::class;
    }
}
