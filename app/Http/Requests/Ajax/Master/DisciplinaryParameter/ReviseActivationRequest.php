<?php

namespace App\Http\Requests\Ajax\Master\DisciplinaryParameter;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Master\DisciplinaryParameter;

class ReviseActivationRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'disciplinary_parameter',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return DisciplinaryParameter::class;
    }
}
