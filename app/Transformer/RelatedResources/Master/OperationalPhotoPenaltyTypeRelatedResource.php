<?php

namespace App\Transformer\RelatedResources\Master;

use Bsb\Foundation\Transformer\RelatedResource;
use App\Transformer\SingleResources\Auth\UserSingleResource;
use App\Transformer\SingleResources\Master\OperationalPhotoTypeSingleResource;

class OperationalPhotoPenaltyTypeRelatedResource extends RelatedResource
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
            'operational_photo_type' => new OperationalPhotoTypeSingleResource($this->operationalPhotoType),
            'active' => (bool) $this->active,
            'description' => $this->description,
            'note' => $this->note,
            'user_create' => new UserSingleResource($this->userCreate),
            'user_update' => new UserSingleResource($this->userUpdate),
            'user_delete' => new UserSingleResource($this->userDelete),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
