<?php

namespace App\Tasks\Auth\User;

use Waffleboss\Foundation\Task;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Hash;

class RevisePasswordTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $user = User::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $user) {
                $user->password = Hash::make($request->input('password'));
                $user->save();
            }
        );

        return $user;
    }
}
