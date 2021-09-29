<?php

namespace App\Http\Requests\Ajax\Master\MarketingActivity;

use App\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'marketing_activity',
        'action' => 'read',
    ];
}
