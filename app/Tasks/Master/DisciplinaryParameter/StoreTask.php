<?php

namespace App\Tasks\Master\DisciplinaryParameter;

use Bsb\Foundation\Task;
use App\Models\Master\DisciplinaryParameter;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $disciplinaryParameter = new DisciplinaryParameter;
        $this->transaction(
            function () use ($request, $disciplinaryParameter) {
                $disciplinaryParameter->code = $request->input('code');
                $disciplinaryParameter->name = $request->input('name');
                $disciplinaryParameter->active = true;
                $disciplinaryParameter->description = $request->input('description');
                $disciplinaryParameter->note = $request->input('note');
                $disciplinaryParameter->save();

                $disciplinaryParameter->disciplinaryValues()
                    ->createMany($request->input('disciplinary_values'));
            }
        );

        return $disciplinaryParameter;
    }
}
