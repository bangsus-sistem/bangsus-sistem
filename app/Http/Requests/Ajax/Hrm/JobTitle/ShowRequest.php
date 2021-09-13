<?php

namespace App\Http\Requests\Ajax\Hrm\JobTitle;

use App\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'job_title',
        'action' => 'read',
    ];
}
