<?php

namespace App\Transformer\RelatedResources\Master;

use Bsb\Foundation\Transformer\RelatedResource;
use App\Transformer\SingleCollections\Master\QualityControlValueSingleResource;

class QualityControlParameterRelatedResource extends RelatedResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'quality_control_type_id' => $this->quality_control_type_id,
            'name' => $this->name,
            'quality_control_values' => new QualityControlValueSingleCollection($this->qualityControlValues),
        ];
    }
}
