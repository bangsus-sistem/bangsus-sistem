<?php

namespace App\Tasks\Master\MarketingActivity;

use Bsb\Foundation\Task;
use App\Models\Master\MarketingActivity;

class AmendTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $marketingActivity = MarketingActivity::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $marketingActivity) {
                $marketingActivity->code = $request->input('code');
                $marketingActivity->name = $request->input('name');
                $marketingActivity->description = $request->input('description');
                $marketingActivity->note = $request->input('note');
                $marketingActivity->save();
            }
        );

        return $marketingActivity;
    }
}
