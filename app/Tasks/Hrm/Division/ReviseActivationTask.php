<?php

namespace App\Tasks\Hrm\Division;

use Bsb\Foundation\Task;
use App\Models\Hrm\Division;

class ReviseActivationTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $state = true)
    {
        $division = Division::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $division, $state) {
                $division->active = $state;
                $division->save();
            }
        );

        return $division;
    }
}
