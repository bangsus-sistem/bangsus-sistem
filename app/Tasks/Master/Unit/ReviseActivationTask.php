<?php

namespace App\Tasks\Master\Unit;

use Bsb\Foundation\Task;
use App\Models\Master\Unit;

class ReviseActivationTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $state = true)
    {
        $unit = Unit::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $unit, $state) {
                $unit->active = $state;
                $unit->save();
            }
        );

        return $unit;
    }
}
