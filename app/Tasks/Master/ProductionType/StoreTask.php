<?php

namespace App\Tasks\Master\ProductionType;

use Bsb\Foundation\Task;
use App\Models\Master\ProductionType;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $productionType = new ProductionType;
        $this->transaction(
            function () use ($request, $productionType) {
                $productionType->code = $request->input('code');
                $productionType->name = $request->input('name');
                $productionType->active = true;
                $productionType->description = $request->input('description');
                $productionType->note = $request->input('note');
                $productionType->save();
            }
        );

        return $productionType;
    }
}
