<?php

namespace App\Services;

use Bsb\Foundation\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use App\Models\Auth\User;
use Illuminate\Http\Request;

class SanctumLogoutService extends Service
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Models\Auth\User
     */
    public function serve($request)
    {
        $user = User::findOrFail($request->user()->id);
        Auth::guard('web')->logout($user->id);
        return $user;
    }
}
