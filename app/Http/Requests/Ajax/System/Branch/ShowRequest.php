<?php

namespace App\Http\Requests\Ajax\System\Branch;

use App\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'branch',
        'action' => 'read',
    ];
}
