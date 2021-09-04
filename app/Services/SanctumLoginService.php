<?php

namespace App\Services;

use Bsb\Foundation\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use App\Http\Requests\Ajax\Log\AuthenticationLog\StoreLoginRequest;
use App\Models\Auth\User;

class SanctumLoginService extends Service
{
    /**
     * @param  \App\Http\Requests\Ajax\Log\AuthenticationLog\StoreLoginRequest  $request
     * @return \App\Models\Auth\User
     */
    public function serve($request)
    {
        if ( ! Auth::attempt($request->only('username', 'password')))
            throw new AuthenticationException;
        
        return User::where(
            'username', $request->input('username')
        )->first();
    }
}
