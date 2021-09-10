<?php

namespace App\Tasks\Auth\User;

use Bsb\Foundation\Task;
use App\Models\Auth\User;

class DestroyTask extends Task
{
    /**
     * @param  \Illuminate\Database\Eloquent\Model  $request
     * @return void
     */
    public function handle($request)
    {
        $user = User::findOrFail($request->input('id'));
        $this->transaction(fn () => $user->delete());
    }
}
