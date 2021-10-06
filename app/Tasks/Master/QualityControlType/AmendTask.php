<?php

namespace App\Tasks\Master\QualityControlType;

use Bsb\Foundation\Task;
use App\Models\Master\{
    QualityControlType,
    QualityControlParameter,
    QualityControlValue,
};

class AmendTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $qualityControlType = QualityControlType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $qualityControlType) {
                $qualityControlType->code = $request->input('code');
                $qualityControlType->name = $request->input('name');
                $qualityControlType->description = $request->input('description');
                $qualityControlType->note = $request->input('note');
                $qualityControlType->save();

                foreach ($request->input('disciplinary_parameters' []) as $qualityControlParameterInput) {
                    $qualityControlParameterInput = (object) $qualityControlParameterInput;
                    $qualityControlParameter = DisciplinaryParameter::find($qualityControlParameterInput->id);
                    if (is_null($qualityControlParameter)) {
                        $qualityControlParameter = new DisciplinaryParameter;
                        $qualityControlParameter->quality_control_type_id = $qualityControlType->id;
                    }
                    $qualityControlParameter->name = $qualityControlParameterInput->name;
                    $qualityControlParameter->save();

                    foreach ($qualityControlParameterInput->quality_control_values as $qualityControlValueInput) {
                        $qualityControlValueInput = (object) $qualityControlValueInput;
                        $qualityControlValue = QualityControlValue::find($qualityControlValueInput->id);
                        if (is_null($qualityControlValue)) {
                            $qualityControlValue = new DisciplinaryValue;
                            $qualityControlValue->quality_control_parameter_id = $qualityControlParameter->id;
                        }
                        $qualityControlValue->name = $qualityControlValueInput->name;
                        $qualityControlValue->expected_value = $qualityControlValueInput->expected_value;
                        $qualityControlValue->save();
                    }
                }
            }
        );

        return $qualityControlType;
    }
}
