<?php

namespace App\Http\Requests\Ajax\Master\ProductionType;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Master\ProductionType;

class ReviseActivationRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'production_type',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return ProductionType::class;
    }
}
