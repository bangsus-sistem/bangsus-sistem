<?php

namespace App\Http\Requests\Res\Auth\Role;

use Bsb\Foundation\Http\FeatureIdRequest;
use App\Models\Auth\Role;

class ReviseActivationRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'role',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return Role::class;
    }
}
