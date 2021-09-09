<?php

namespace App\Http\Requests\Ajax\System\Branch;

use App\Http\Requests\FeatureIdRequest;
use App\Models\System\Branch;

class ReviseActivationRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'branch',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return Branch::class;
    }
}
