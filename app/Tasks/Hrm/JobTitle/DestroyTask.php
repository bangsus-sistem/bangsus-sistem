<?php

namespace App\Tasks\Hrm\JobTitle;

use Bsb\Foundation\Task;
use App\Models\Hrm\JobTitle;

class DestroyTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function handle($request)
    {
        $jobTitle = JobTitle::findOrFail($request->input('id'));
        $this->transaction(fn () => $jobTitle->delete());
    }
}
