<?php

namespace App\Tasks\Master\OperationalPhotoPenaltyType;

use Bsb\Foundation\Task;
use App\Models\Master\OperationalPhotoPenaltyType;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $operationalPhotoPenaltyType = new OperationalPhotoPenaltyType;
        $this->transaction(
            function () use ($request, $operationalPhotoPenaltyType) {
                $operationalPhotoPenaltyType->code = $request->input('code');
                $operationalPhotoPenaltyType->name = $request->input('name');
                $operationalPhotoPenaltyType->amount = $request->input('amount');
                $operationalPhotoPenaltyType->operational_photo_type_id = $request->input('operational_photo_type_id');
                $operationalPhotoPenaltyType->active = true;
                $operationalPhotoPenaltyType->description = $request->input('description');
                $operationalPhotoPenaltyType->note = $request->input('note');
                $operationalPhotoPenaltyType->save();
            }
        );

        return $operationalPhotoPenaltyType;
    }
}
