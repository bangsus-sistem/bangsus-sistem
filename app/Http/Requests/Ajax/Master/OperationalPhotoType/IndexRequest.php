<?php

namespace App\Http\Requests\Ajax\Master\OperationalPhotoType;

use App\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'operational_photo_type',
        'action' => 'index',
    ];
}
