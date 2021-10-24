<?php

namespace App\Http\Requests\Ajax\Master\OperationalPhotoPenaltyType;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Master\OperationalPhotoPenaltyType;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'operational_photo_penalty_type',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return OperationalPhotoPenaltyType::class;
    }
}
