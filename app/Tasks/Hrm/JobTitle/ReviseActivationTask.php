<?php

namespace App\Tasks\Hrm\JobTitle;

use Bsb\Foundation\Task;
use App\Models\Hrm\JobTitle;

class ReviseActivationTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $state = true)
    {
        $jobTitle = JobTitle::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $jobTitle, $state) {
                $jobTitle->active = $state;
                $jobTitle->save();
            }
        );

        return $jobTitle;
    }
}
