<?php

namespace App\Http\Requests\Ajax\Master\ProductionType;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Master\ProductionType;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'production_type',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return ProductionType::class;
    }
}
