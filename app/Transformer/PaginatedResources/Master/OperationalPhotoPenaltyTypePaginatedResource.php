<?php

namespace App\Transformer\PaginatedResources\Master;

use Bsb\Foundation\Transformer\PaginatedResource;

class OperationalPhotoPenaltyTypePaginatedResource extends PaginatedResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'amount' => (float) $this->amount,
            'operational_photo_type' => new OperationalPhotoTypePaginatedResource($this->operationalPhotoType),
            'active' => (bool) $this->active,
        ];
    }
}
