<?php

namespace App\Http\Requests\Ajax\Operational\OperationalPhoto;

use App\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'operational_photo',
        'action' => 'read',
    ];
}
