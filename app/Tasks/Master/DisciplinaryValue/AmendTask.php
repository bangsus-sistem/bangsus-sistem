<?php

namespace App\Tasks\Master\DisciplinaryValue;

use Bsb\Foundation\Task;
use App\Models\Master\DisciplinaryValue;

class AmendTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $disciplinaryValue = DisciplinaryValue::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $disciplinaryValue) {
                $disciplinaryValue->name = $request->input('name');
                $disciplinaryValue->expected_value = $request->boolean('expected_value');
                $disciplinaryValue->save();
            }
        );

        return $disciplinaryValue;
    }
}
