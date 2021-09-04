<?php

namespace App\Http\Requests\Ajax\Log\ActivityLog;

use App\Http\Requests\WidgetRequest;

class RevealTrafficRequest extends WidgetRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'widget' => 'activity_log_traffic',
    ];
}
