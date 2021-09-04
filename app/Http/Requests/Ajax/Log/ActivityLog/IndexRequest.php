<?php

namespace App\Http\Requests\Ajax\Log\ActivityLog;

use App\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'activity_log',
        'action' => 'index',
    ];
}
