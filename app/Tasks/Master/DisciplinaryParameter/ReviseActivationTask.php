<?php

namespace App\Tasks\Master\DisciplinaryParameter;

use Bsb\Foundation\Task;
use App\Models\Master\DisciplinaryParameter;

class ReviseActivationTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $state = true)
    {
        $disciplinaryParameter = DisciplinaryParameter::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $disciplinaryParameter, $state) {
                $disciplinaryParameter->active = $state;
                $disciplinaryParameter->save();
            }
        );

        return $disciplinaryParameter;
    }
}
