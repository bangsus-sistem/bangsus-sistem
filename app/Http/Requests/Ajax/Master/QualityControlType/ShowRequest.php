<?php

namespace App\Http\Requests\Ajax\Master\QualityControlType;

use App\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'quality_control_type',
        'action' => 'read',
    ];
}
