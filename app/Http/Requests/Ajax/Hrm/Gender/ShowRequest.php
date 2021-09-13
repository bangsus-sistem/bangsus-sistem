<?php

namespace App\Http\Requests\Ajax\Hrm\Gender;

use App\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'gender',
        'action' => 'read',
    ];
}
