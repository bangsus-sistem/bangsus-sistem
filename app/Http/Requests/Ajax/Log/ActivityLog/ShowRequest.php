<?php

namespace App\Http\Requests\Ajax\Log\ActivityLog;

use App\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'activity_log',
        'action' => 'read',
    ];
}
