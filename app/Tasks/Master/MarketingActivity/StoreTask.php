<?php

namespace App\Tasks\Master\MarketingActivity;

use Bsb\Foundation\Task;
use App\Models\Master\MarketingActivity;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $marketingActivity = new MarketingActivity;
        $this->transaction(
            function () use ($request, $marketingActivity) {
                $marketingActivity->code = $request->input('code');
                $marketingActivity->name = $request->input('name');
                $marketingActivity->active = true;
                $marketingActivity->description = $request->input('description');
                $marketingActivity->note = $request->input('note');
                $marketingActivity->save();
            }
        );

        return $marketingActivity;
    }
}
