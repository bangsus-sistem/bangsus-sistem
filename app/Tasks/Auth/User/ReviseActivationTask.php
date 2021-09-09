<?php

namespace App\Tasks\Auth\User;

use Bsb\Foundation\Task;

class ReviseActivationTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $state = true)
    {
        $user = User::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $user, $state) {
                $user->active = $state;
                $user->save();
            }
        );

        return $user;
    }
}
