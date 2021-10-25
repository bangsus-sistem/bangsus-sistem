<?php

namespace App\Http\Requests\Ajax\Penalty\CommonPenalty;

use App\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'common_penalty',
        'action' => 'index',
    ];
}
