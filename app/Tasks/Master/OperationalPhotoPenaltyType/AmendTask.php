<?php

namespace App\Tasks\Master\OperationalPhotoPenaltyType;

use Bsb\Foundation\Task;
use App\Models\Master\OperationalPhotoPenaltyType;

class AmendTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $operationalPhotoPenaltyType = OperationalPhotoPenaltyType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $operationalPhotoPenaltyType) {
                $operationalPhotoPenaltyType->code = $request->input('code');
                $operationalPhotoPenaltyType->name = $request->input('name');
                $operationalPhotoPenaltyType->amount = $request->input('amount');
                $operationalPhotoPenaltyType->operational_photo_type_id = $request->input('operational_photo_type_id');
                $operationalPhotoPenaltyType->description = $request->input('description');
                $operationalPhotoPenaltyType->note = $request->input('note');
                $operationalPhotoPenaltyType->save();
            }
        );

        return $operationalPhotoPenaltyType;
    }
}
