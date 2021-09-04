<?php

namespace App\Http\Requests\Ajax\Log\AuthenticationLog;

use App\Http\Requests\WidgetRequest;

class RevealLatestRequest extends WidgetRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'widget' => 'latest_authentication_log',
    ];
}
