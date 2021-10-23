<?php

namespace App\Http\Requests\Ajax\Master\DisciplinaryValue;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Master\DisciplinaryValue;

class DestroyRequest extends FeatureIdRequest
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
        return DisciplinaryValue::class;
    }
}
