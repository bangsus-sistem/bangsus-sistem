<?php

namespace App\Http\Requests\Ajax\Master\MarketingItem;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Master\MarketingItem;

class ReviseActivationRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'marketing_item',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return MarketingItem::class;
    }
}
