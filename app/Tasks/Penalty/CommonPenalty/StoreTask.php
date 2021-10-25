<?php

namespace App\Tasks\Penalty\CommonPenalty;

use Bsb\Foundation\Task;
use App\Models\Penalty\CommonPenalty;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $commonPenalty = new CommonPenalty;
        $this->transaction(
            function () use ($request, $commonPenalty) {
                $commonPenalty->transaction_datetime = date('Y-m-d H:i:s');
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
