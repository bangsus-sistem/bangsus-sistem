<?php

namespace App\Http\Requests\Ajax\Penalty\CommonPenalty;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Penalty\CommonPenalty;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'common_penalty',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return CommonPenalty::class;
    }
}
