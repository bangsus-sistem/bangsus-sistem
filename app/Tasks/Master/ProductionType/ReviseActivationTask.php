<?php

namespace App\Tasks\Master\ProductionType;

use Bsb\Foundation\Task;
use App\Models\Master\ProductionType;

class ReviseActivationTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $state = true)
    {
        $productionType = ProductionType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $productionType, $state) {
                $productionType->active = $state;
                $productionType->save();
            }
        );

        return $productionType;
    }
}
