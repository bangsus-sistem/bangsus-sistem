<?php

namespace App\Tasks\Master\GeneralCleaningActivity;

use Bsb\Foundation\Task;
use App\Models\Master\GeneralCleaningActivity;

class AmendTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $generalCleaningActivity = GeneralCleaningActivity::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $generalCleaningActivity) {
                $generalCleaningActivity->code = $request->input('code');
                $generalCleaningActivity->name = $request->input('name');
                $generalCleaningActivity->description = $request->input('description');
                $generalCleaningActivity->note = $request->input('note');
                $generalCleaningActivity->save();
            }
        );

        return $generalCleaningActivity;
    }
}
