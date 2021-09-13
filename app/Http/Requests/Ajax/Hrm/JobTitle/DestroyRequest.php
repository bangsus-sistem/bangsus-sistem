<?php

namespace App\Http\Requests\Ajax\Hrm\JobTitle;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Hrm\JobTitle;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'job_title',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return JobTitle::class;
    }
}
