<?php

namespace App\Transformer\SingleResources\Master;

use Bsb\Foundation\Transformer\SingleResource;

class MinimumOperationalPhotoSingleResource extends SingleResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'operational_photo_type_id' => $this->operational_photo_type_id,
            'branch_id' => $this->branch_id,
            'minimum' => $this->minimum,
        ];
    }
}
