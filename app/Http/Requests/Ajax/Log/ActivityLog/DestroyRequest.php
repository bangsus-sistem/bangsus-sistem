<?php

namespace App\Http\Requests\Ajax\Log\ActivityLog;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Log\ActivityLog;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'activity_log',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return ActivityLog::class;
    }
}
