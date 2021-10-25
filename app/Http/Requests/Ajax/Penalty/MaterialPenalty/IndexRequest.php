<?php

namespace App\Http\Requests\Ajax\Penalty\MaterialPenalty;

use App\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'material_penalty',
        'action' => 'index',
    ];
}
