<?php

namespace App\Tasks\Master\OperationalPhotoPenaltyType;

use Bsb\Foundation\Task;
use App\Models\Master\OperationalPhotoPenaltyType;

class ReviseActivationTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $state = true)
    {
        $operationalPhotoPenaltyType = OperationalPhotoPenaltyType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $operationalPhotoPenaltyType, $state) {
                $operationalPhotoPenaltyType->active = $state;
                $operationalPhotoPenaltyType->save();
            }
        );

        return $operationalPhotoPenaltyType;
    }
}
