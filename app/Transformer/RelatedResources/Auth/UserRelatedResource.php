<?php

namespace App\Transformer\RelatedResources\Auth;

use Bsb\Foundation\Transformer\RelatedResource;
use App\Transformer\SingleResources\Auth\{
    UserSingleResource,
    RoleSingleResource,
};
use App\Transformer\SingleCollections\System\BranchSingleCollection;

class UserRelatedResource extends RelatedResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'full_name' => $this->full_name,
            'role' => new RoleSingleResource($this->role),
            'active' => (bool) $this->active,
            'locked' => (bool) $this->locked,
            'hidden' => (bool) $this->hidden,
            'all_branches' => (bool) $this->all_branches,
            'branches' => new BranchSingleCollection($this->branches),
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
