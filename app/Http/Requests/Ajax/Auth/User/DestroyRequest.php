<?php

namespace App\Http\Requests\Ajax\Auth\User;

use App\Http\Requests\FeatureIdRequest;
use App\Models\Auth\User;

class DestroyRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'user',
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return User::class;
    }
}
