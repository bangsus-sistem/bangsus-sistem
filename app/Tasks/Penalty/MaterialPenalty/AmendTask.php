<?php

namespace App\Tasks\Penalty\MaterialPenalty;

use Bsb\Foundation\Task;
use App\Models\Penalty\MaterialPenalty;

class AmendTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $materialPenalty = MaterialPenalty::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $materialPenalty) {
                $materialPenalty->branch_id = $request->input('branch_id');
                $materialPenalty->month = date('m', strtotime($request->input('month')));
                $materialPenalty->year = date('Y', strtotime($request->input('month')));
                $materialPenalty->total = $request->input('total');
                $materialPenalty->description = $request->input('description');
                $materialPenalty->note = $request->input('note');
                $materialPenalty->save();
            }
        );

        return $materialPenalty;
    }
}
