<?php

namespace App\Http\Requests\Ajax\Master\MarketingItem;

use App\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'marketing_item',
        'action' => 'read',
    ];
}
