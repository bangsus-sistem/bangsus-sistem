<?php

namespace App\Tasks\Auth\User;

use Bsb\Foundation\Task;
use App\Models\Auth\User;
use App\Models\System\Branch;
use Illuminate\Support\Facades\Hash;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $user = new User;
        $this->transaction(
            function () use ($request, $user) {
                $user->username = $request->input('username');
                $user->password = Hash::make($request->input('password'));
                $user->full_name = $request->input('full_name');
                $user->role_id = $request->input('role_id');
                $user->active = true;
                $user->all_branches = $request->boolean('all_branches');
                $user->description = $request->input('description');
                $user->note = $request->input('note');
                $user->save();

                if ( ! $user->all_branches)
                    $user->branches()->sync($request->input('branch_ids'));
                else
                    $user->branches()->sync(Branch::all()->pluck('id')->all());
            }
        );

        return $user;
    }
}
