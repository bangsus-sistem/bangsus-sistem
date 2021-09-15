<?php

namespace App\Transformer\RelatedResources\Hrm;

use Bsb\Foundation\Transformer\RelatedResource;
use App\Transformer\SingleResources\Hrm\{
    BloodTypeSingleResource,
    GenderSingleResource,
    JobTitleSingleResource,
};
use App\Transformer\SingleResources\System\BranchSingleResource;
use App\Transformer\SingleResources\Auth\UserSingleResource;
use App\Transformer\SingleCollections\Hrm\{
    EmployeeAddressSingleCollection,
    EmployeeContactSingleCollection,
    EmployeePhotoSingleCollection,
};

class EmployeeRelatedResource extends RelatedResource
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
            'nik' => $this->nik,
            'full_name' => $this->full_name,
            'birth_place' => $this->birth_place,
            'birth_date' => $this->birth_date,
            'blood_type' => new BloodTypeSingleResource($this->bloodType),
            'gender' => new GenderSingleResource($this->gender),
            'first_branch' => new BranchSingleResource($this->firstBranch),
            'first_job_title' => new JobTitleSingleResource($this->firstJobTitle),
            'start_date' => $this->start_date,
            'admitted' => (boolean) $this->admitted,
            'description' => $this->description,
            'note' => $this->note,
            'employee_addresses' => new EmployeeAddressSingleCollection($this->employeeAddresses),
            'employee_contacts' => new EmployeeContactSingleCollection($this->employeeContacts),
            'employee_photos' => new EmployeePhotoSingleCollection($this->employeePhotos),
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
