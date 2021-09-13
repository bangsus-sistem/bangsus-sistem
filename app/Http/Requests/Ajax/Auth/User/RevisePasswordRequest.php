<?php

namespace App\Http\Requests\Res\Auth\User;

use Bsb\Foundation\Http\AuthIdRequest;
use App\Models\Auth\User;

class RevisePasswordRequest extends AuthIdRequest
{
    /**
     * @var string
     */
    protected $type = 'feature';

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

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [
            'password' => [
                'required',
                'min:6',
            ],
            'password_confirmation' => [
                'required_with:password',
                'same:password',
            ],
        ];
    }
}
