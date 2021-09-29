<?php

namespace App\Http\Requests\Ajax\Master\ProductionType;

use App\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'production_type',
        'action' => 'index',
    ];
}
