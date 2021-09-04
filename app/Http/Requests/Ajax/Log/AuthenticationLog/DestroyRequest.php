<?php

namespace App\Http\Requests\Ajax\Log\AuthenticationLog;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Log\AuthenticationLog;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'authentication_log',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return AuthenticationLog::class;
    }
}
