<?php

namespace App\Http\Requests\Ajax\Auth\User;

use Bsb\Foundation\Http\FeatureIdRequest;
use App\Models\Auth\User;

class ReviseActivationRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'user',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return User::class;
    }
}
