<?php

namespace App\Http\Requests\Ajax\Master\Unit;

use App\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'unit',
        'action' => 'read',
    ];
}
