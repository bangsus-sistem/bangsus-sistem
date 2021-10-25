<?php

namespace App\Http\Requests\Ajax\Penalty\CommonPenalty;

use App\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'common_penalty',
        'action' => 'read',
    ];
}
