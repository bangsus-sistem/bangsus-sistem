<?php

namespace App\Tasks\Master\DisciplinaryParameter;

use Bsb\Foundation\Task;
use App\Models\Master\{
    DisciplinaryParameter,
    DisciplinaryValue,
};

class AmendTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $disciplinaryParameter = DisciplinaryParameter::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $disciplinaryParameter) {
                $disciplinaryParameter->code = $request->input('code');
                $disciplinaryParameter->name = $request->input('name');
                $disciplinaryParameter->description = $request->input('description');
                $disciplinaryParameter->note = $request->input('note');
                $disciplinaryParameter->save();

                $disciplinaryParameter
                    ->disciplinaryValues()
                    ->whereNotIn('id', collect($request->input('disciplinary_values'))->pluck('id')->all())
                    ->delete();

                foreach ($request->input('disciplinary_values', []) as $disciplinaryValueInput) {
                    $disciplinaryValueInput = (object) $disciplinaryValueInput;
                    $disciplinaryValue = DisciplinaryValue::find($disciplinaryValueInput->id ?? null);
                    if (is_null($disciplinaryValue)) {
                        $disciplinaryValue = new DisciplinaryValue;
                        $disciplinaryValue->disciplinary_parameter_id = $disciplinaryParameter->id;
                    }
                    $disciplinaryValue->name = $disciplinaryValueInput->name;
                    $disciplinaryValue->expected_value = $disciplinaryValueInput->expected_value;
                    $disciplinaryValue->save();
                }
            }
        );

        return $disciplinaryParameter;
    }
}
