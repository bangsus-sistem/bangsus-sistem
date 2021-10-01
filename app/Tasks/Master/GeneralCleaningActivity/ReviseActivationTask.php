<?php

namespace App\Tasks\Master\GeneralCleaningActivity;

use Bsb\Foundation\Task;
use App\Models\Master\GeneralCleaningActivity;

class ReviseActivationTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $state = true)
    {
        $generalCleaningActivity = GeneralCleaningActivity::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $generalCleaningActivity, $state) {
                $generalCleaningActivity->active = $state;
                $generalCleaningActivity->save();
            }
        );

        return $generalCleaningActivity;
    }
}
