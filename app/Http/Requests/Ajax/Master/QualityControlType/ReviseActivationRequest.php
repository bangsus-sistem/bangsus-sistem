<?php

namespace App\Http\Requests\Ajax\Master\QualityControlType;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Master\QualityControlType;

class ReviseActivationRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'quality_control_type',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return QualityControlType::class;
    }
}
