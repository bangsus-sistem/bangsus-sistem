<?php

namespace App\Http\Requests\Ajax\Hrm\Gender;

use App\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'gender',
        'action' => 'index',
    ];
}
