<?php

namespace App\Transformer\RelatedResources\Master;

use Bsb\Foundation\Transformer\RelatedResource;
use App\Transformer\SingleResources\Master\DisciplinaryParameterSingleResource;

class DisciplinaryValueRelatedResource extends RelatedResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'disciplinary_parameter' => new DisciplinaryParameterSingleResource($this->disciplinaryParameter),
            'name' => $this->name,
            'expected_value' => (bool) $this->expected_value,
        ];
    }
}
