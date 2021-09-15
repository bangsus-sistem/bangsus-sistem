<?php

namespace App\Transformer\RelatedResources\Hrm;

use Bsb\Foundation\Transformer\RelatedResource;
use App\Transformer\SingleResources\Hrm\EmployeeSingleResource;
use App\Transformer\SingleResources\System\BranchSingleResource;
use App\Transformer\SingleResources\Auth\UserSingleResource;

class EmployeeAssignmentRelatedResource extends RelatedResource
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
            'branch' => new BranchSingleResource($this->branch),
            'first_job_title' => new JobTitleRelatedResource($this->firstJobTitle),
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'admitted' => (boolean) $this->admitted,
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
