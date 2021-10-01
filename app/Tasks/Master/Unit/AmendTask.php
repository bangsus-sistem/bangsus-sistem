<?php

namespace App\Tasks\Master\Unit;

use Bsb\Foundation\Task;
use App\Models\Master\Unit;

class AmendTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $unit = Unit::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $unit) {
                $unit->code = $request->input('code');
                $unit->name = $request->input('name');
                $unit->description = $request->input('description');
                $unit->note = $request->input('note');
                $unit->save();
            }
        );

        return $unit;
    }
}
