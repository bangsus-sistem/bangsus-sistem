<?php

namespace App\Http\Requests\Ajax\Operational\OperationalPhoto;

use App\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'operational_photo',
        'action' => 'index',
    ];
}
