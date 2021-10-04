<?php

namespace App\Http\Requests\Ajax\Master\OperationalPhotoType;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Master\OperationalPhotoType;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'operational_photo_type',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return OperationalPhotoType::class;
    }
}
