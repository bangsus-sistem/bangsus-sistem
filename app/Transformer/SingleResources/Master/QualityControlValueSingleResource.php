<?php

namespace App\Transformer\SingleResources\Master;

use Bsb\Foundation\Transformer\SingleResource;

class QualityControlValueSingleResource extends SingleResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'quality_control_parameter_id' => $this->quality_control_parameter_id,
            'name' => $this->name,
            'expected_value' => $this->expected_value,
        ];
    }
}
