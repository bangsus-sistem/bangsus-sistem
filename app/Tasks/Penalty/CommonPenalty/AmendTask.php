<?php

namespace App\Tasks\Penalty\CommonPenalty;

use Bsb\Foundation\Task;
use App\Models\Penalty\CommonPenalty;

class AmendTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $commonPenalty = CommonPenalty::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $commonPenalty) {
                $commonlPenalty->month = date('m', strtotime($request->input('month')));
                $commonlPenalty->year = date('Y', strtotime($request->input('month')));
                $commonPenalty->branch_id = $request->input('branch_id');
                $commonPenalty->total = $request->input('total');
                $commonPenalty->description = $request->input('description');
                $commonPenalty->note = $request->input('note');
                $commonPenalty->save();
            }
        );

        return $commonPenalty;
    }
}
