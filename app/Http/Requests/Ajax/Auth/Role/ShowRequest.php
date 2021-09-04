<?php

namespace App\Http\Requests\Ajax\Auth\Role;

use App\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'role',
        'action' => 'read',
    ];
}
