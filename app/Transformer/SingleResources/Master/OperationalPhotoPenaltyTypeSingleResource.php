<?php

namespace App\Transformer\SingleResources\Master;

use Bsb\Foundation\Transformer\SingleResource;

class OperationalPhotoPenaltyTypeSingleResource extends SingleResource
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
            'operational_photo_type_id' => $this->operational_photo_type_id,
            'active' => (bool) $this->active,
            'user_create_id' => $this->user_create_id,
            'user_update_id' => $this->user_update_id,
            'user_delete_id' => $this->user_delete_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
