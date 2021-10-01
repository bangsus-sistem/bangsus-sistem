<?php

namespace App\Http\Requests\Ajax\Master\Unit;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Master\Unit;

class ReviseActivationRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'unit',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return Unit::class;
    }
}
