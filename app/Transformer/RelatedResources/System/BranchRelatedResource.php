<?php

namespace App\Transformer\RelatedResources\System;

use Bsb\Foundation\Transformer\RelatedResource;
use App\Transformer\SingleResources\System\BranchTypeSingleResource;
use App\Transformer\SingleResources\Auth\UserSingleResource;

class BranchRelatedResource extends RelatedResource
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
            'branch_type' => new BranchTypeSingleResource($this->branchType),
            'active' => (bool) $this->active,
            'locked' => (bool) $this->locked,
            'hidden' => (bool) $this->hidden,
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
