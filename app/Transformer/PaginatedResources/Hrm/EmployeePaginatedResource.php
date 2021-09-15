<?php

namespace App\Transformer\PaginatedResources\Hrm;

use Bsb\Foundation\Transformer\PaginatedResource;
use App\Transformer\PaginatedResources\System\BranchPaginatedResource;

class EmployeePaginatedResource extends PaginatedResource
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
            'blood_type' => new BloodTypePaginatedResource($this->bloodType),
            'gender' => new GenderPaginatedResource($this->gender),
            'first_branch' => new BranchPaginatedResource($this->firstBranch),
            'first_job_title' => new JobTitlePaginatedResource($this->firstJobTitle),
            'start_date' => $this->start_date,
            'admitted' => (boolean) $this->admitted,
            'description' => $this->description,
            'note' => $this->note,
        ];
    }
}
