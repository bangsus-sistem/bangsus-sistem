<?php

namespace App\Tasks\Hrm\Gender;

use Bsb\Foundation\Task;
use App\Models\Hrm\Gender;

class ReviseActivationTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $state = true)
    {
        $gender = Gender::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $gender, $state) {
                $gender->active = $state;
                $gender->save();
            }
        );

        return $gender;
    }
}
