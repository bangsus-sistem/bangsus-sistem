<?php

namespace App\Transformer\RelatedResources\Hrm;

use Bsb\Foundation\Transformer\RelatedResource;
use App\Transformer\SingleResources\Storage\ImageSingleResource;
use App\Transformer\SingleResources\Auth\UserSingleResource;

class EmployeePhotoRelatedResource extends RelatedResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'employee' => new EmployeeSingleResource($this->employee),
            'photo_type' => new EmployeePhotoTypeSingleResource($this->employeePhotoType),
            'image' => new ImageSingleResource($this->image),
            'description' => $this->description,
            'note' => $this->note,
            'user_create' => new UserSingleResource($this->userCreate),
            'user_update' => new UserSingleResource($this->userUpdate),
            'user_admit' => new UserSingleResource($this->userAdmit),
            'user_delete' => new UserSingleResource($this->userDelete),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'admitted_at' => $this->admitted_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
