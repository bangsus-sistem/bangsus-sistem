<?php

namespace App\Transformer\RelatedResources\Master;

use Bsb\Foundation\Transformer\RelatedResource;
use App\Transformer\SingleResources\Auth\UserSingleResource;
use App\Transformer\SingleCollections\Master\MinimumOperationalPhotoSingleCollection;

class OperationalPhotoTypeRelatedResource extends RelatedResource
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
            'active' => (bool) $this->active,
            'minimum_operational_photos' => new MinimumOperationalPhotoSingleCollection($this->minimumOperationalPhotos),
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
