<?php

namespace App\Http\Requests\Ajax\Log\AuthenticationLog;

use App\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'authentication_log',
        'action' => 'read',
    ];
}
