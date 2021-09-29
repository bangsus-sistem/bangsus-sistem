<?php

namespace App\Http\Requests\Ajax\Master\OperationalPhotoType;

use App\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'operational_photo_type',
        'action' => 'read',
    ];
}
