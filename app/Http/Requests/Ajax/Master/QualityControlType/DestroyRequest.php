<?php

namespace App\Http\Requests\Ajax\Master\QualityControlType;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Master\QualityControlType;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'quality_control_type',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return QualityControlType::class;
    }
}
