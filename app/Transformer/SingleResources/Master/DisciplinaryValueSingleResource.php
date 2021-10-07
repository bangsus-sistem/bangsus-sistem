<?php

namespace App\Transformer\SingleResources\Master;

use Bsb\Foundation\Transformer\SingleResource;

class DisciplinaryValueSingleResource extends SingleResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'disciplinary_parameter_id' => $this->disciplinary_parameter_id,
            'name' => $this->name,
            'expected_value' => (bool) $this->expected_value,
        ];
    }
}
