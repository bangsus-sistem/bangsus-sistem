<?php

namespace App\Http\Requests\Ajax\Master\MarketingActivity;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Master\MarketingActivity;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'marketing_activity',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return MarketingActivity::class;
    }
}
