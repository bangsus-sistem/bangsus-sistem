<?php

namespace App\Http\Requests\Ajax\Master\Unit;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Master\Unit;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'unit',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return Unit::class;
    }
}
