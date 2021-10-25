<?php

namespace App\Http\Requests\Ajax\Penalty\MaterialPenalty;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Penalty\MaterialPenalty;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'material_penalty',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return MaterialPenalty::class;
    }
}
