<?php

namespace App\Tasks\Master\GeneralCleaningActivity;

use Bsb\Foundation\Task;
use App\Models\Master\GeneralCleaningActivity;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $generalCleaningActivity = new GeneralCleaningActivity;
        $this->transaction(
            function () use ($request, $generalCleaningActivity) {
                $generalCleaningActivity->code = $request->input('code');
                $generalCleaningActivity->name = $request->input('name');
                $generalCleaningActivity->active = true;
                $generalCleaningActivity->description = $request->input('description');
                $generalCleaningActivity->note = $request->input('note');
                $generalCleaningActivity->save();
            }
        );

        return $generalCleaningActivity;
    }
}
