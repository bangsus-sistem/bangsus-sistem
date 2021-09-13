<?php

namespace App\Http\Requests\Ajax\Hrm\JobTitle;

use App\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'job_title',
        'action' => 'index',
    ];
}
