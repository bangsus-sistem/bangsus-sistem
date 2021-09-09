<?php

namespace App\Http\Requests\Ajax\Auth\Role;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Auth\Role;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'role',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return Role::class;
    }
}
