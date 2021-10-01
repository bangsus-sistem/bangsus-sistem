<?php

namespace App\Tasks\Master\MarketingActivity;

use Bsb\Foundation\Task;
use App\Models\Master\MarketingActivity;

class ReviseActivationTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $state = true)
    {
        $marketingActivity = MarketingActivity::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $marketingActivity, $state) {
                $marketingActivity->active = $state;
                $marketingActivity->save();
            }
        );

        return $marketingActivity;
    }
}
