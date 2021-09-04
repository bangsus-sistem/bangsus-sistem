<?php

namespace App\Tasks\Log\AuthenticationLog;

use Cheddarboss\Foundation\Task;
use App\Models\Log\AuthenticationLog;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Model  $user
     * @param  boolean  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $user = null, $state = true)
    {
        $authenticationLog = new AuthenticationLog;
        $this->transaction(
            function () use ($request, $authenticationLog, $user, $state) {
                $authenticationLog->user_id = $user->id;
                $authenticationLog->state = $state;
                $authenticationLog->save();
            }
        );

        return $authenticationLog;
    }
}
