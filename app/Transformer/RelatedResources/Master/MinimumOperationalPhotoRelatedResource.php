<?php

namespace App\Transformer\RelatedResources\Master;

use Bsb\Foundation\Transformer\RelatedResource;
use App\Transformer\SingleResources\Auth\UserSingleResource;

class MinimumOperationalPhotoRelatedResource extends RelatedResource
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
