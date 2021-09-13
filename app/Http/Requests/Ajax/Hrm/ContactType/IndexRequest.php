<?php

namespace App\Http\Requests\Ajax\Hrm\ContactType;

use App\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'contact_type',
        'action' => 'index',
    ];
}
