<?php

namespace App\Tasks\Master\QualityControlType;

use Bsb\Foundation\Task;
use App\Models\Master\{
    QualityControlType,
    QualityControlParameter,
};

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $qualityControlType = new QualityControlType;
        $this->transaction(
            function () use ($request, $qualityControlType) {
                $qualityControlType->code = $request->input('code');
                $qualityControlType->name = $request->input('name');
                $qualityControlType->active = true;
                $qualityControlType->description = $request->input('description');
                $qualityControlType->note = $request->input('note');
                $qualityControlType->save();

                foreach ($request->input('quality_control_parameters') as $qualityControlParameterInput) {
                    $qualityControlParameterInput = (object) $qualityControlParameterInput;
                    $qualityControlParameter = new QualityControlParameter;
                    $qualityControlParameter->quality_control_type_id = $qualityControlType->id;
                    $qualityControlParameter->name = $qualityControlParameterInput->name;
                    $qualityControlParameter->save();

                    $qualityControlParameter->qualityControlValues()
                        ->createMany($qualityControlParameterInput->quality_control_values);
                }
            }
        );

        return $qualityControlType;
    }
}
