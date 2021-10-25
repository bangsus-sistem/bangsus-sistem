<?php

namespace App\Http\Requests\Ajax\Penalty\MaterialPenalty;

use App\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'material_penalty',
        'action' => 'read',
    ];
}
