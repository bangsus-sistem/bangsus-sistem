<?php

namespace App\Http\Requests\Ajax\Auth\User;

use App\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'user',
        'action' => 'read',
    ];
}
