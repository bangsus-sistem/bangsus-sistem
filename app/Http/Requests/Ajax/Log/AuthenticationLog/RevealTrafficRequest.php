<?php

namespace App\Http\Requests\Ajax\Log\AuthenticationLog;

use App\Http\Requests\WidgetRequest;

class RevealTrafficRequest extends WidgetRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'widget' => 'authentication_log_traffic',
    ];
}
