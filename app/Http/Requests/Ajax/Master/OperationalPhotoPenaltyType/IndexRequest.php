<?php

namespace App\Http\Requests\Ajax\Master\OperationalPhotoPenaltyType;

use App\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'operational_photo_penalty_type',
        'action' => 'index',
    ];
}
