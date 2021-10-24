<?php

namespace App\Http\Requests\Ajax\Master\MinimumOperationalPhoto;

use App\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'minimum_operational_photo',
        'action' => 'update',
    ];
}
