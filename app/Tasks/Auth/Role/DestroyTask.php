<?php

namespace App\Tasks\Auth\Role;

use Bsb\Foundation\Task;
use App\Models\Auth\Role;

class DestroyTask extends Task
{
    /**
     * @param  \Illuminate\Database\Eloquent\Model  $request
     * @return void
     */
    public function handle($request)
    {
        $role = Role::findOrFail($request->input('id'));
        $this->transaction(fn () => $role->delete());
    }
}
