<?php

namespace App\Http\Requests\Ajax\Hrm\Division;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Hrm\Division;

class ReviseActivationRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'division',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return Division::class;
    }
}
