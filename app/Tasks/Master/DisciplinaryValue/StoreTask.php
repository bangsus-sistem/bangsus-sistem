<?php

namespace App\Tasks\Master\DisciplinaryValue;

use Bsb\Foundation\Task;
use App\Models\Master\DisciplinaryValue;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $disciplinaryValue = new DisciplinaryValue;
        $this->transaction(
            function () use ($request, $disciplinaryValue) {
                $disciplinaryValue->disciplinary_parameter_id = $request->input('disciplinary_parameter_id');
                $disciplinaryValue->name = $request->input('name');
                $disciplinaryValue->expected_value = $request->boolean('expected_value');
                $disciplinaryValue->save();
            }
        );

        return $disciplinaryValue;
    }
}
