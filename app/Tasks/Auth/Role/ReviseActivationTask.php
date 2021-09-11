<?php

namespace App\Tasks\Auth\Role;

use Bsb\Foundation\Task;
use App\Models\Auth\Role;

class ReviseActivationTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $state = true)
    {
        $role = Role::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $role, $state) {
                $role->active = $state;
                $role->save();
            }
        );

        return $role;
    }
}
