<?php

namespace App\Http\Requests\Ajax\Master\MarketingActivity;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Master\MarketingActivity;

class ReviseActivationRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'marketing_activity',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return MarketingActivity::class;
    }
}
