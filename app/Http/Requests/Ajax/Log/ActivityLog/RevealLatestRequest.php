<?php

namespace App\Http\Requests\Ajax\Log\ActivityLog;

use App\Http\Requests\WidgetRequest;

class RevealLatestRequest extends WidgetRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'widget' => 'latest_activity_log',
    ];
}
