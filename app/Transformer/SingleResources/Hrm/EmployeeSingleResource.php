<?php

namespace App\Transformer\SingleResources\Hrm;

use Bsb\Foundation\Transformer\SingleResource;

class EmployeeSingleResource extends SingleResource
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
            'place_of_birth' => $this->place_of_birth,
            'date_of_birth' => $this->date_of_birth,
            'blood_type_id' => $this->blood_type_id,
            'gender_id' => $this->gender_id,
            'first_branch_id' => $this->first_branch_id,
            'first_job_title_id' => $this->first_job_title_id,
            'start_date' => $this->start_date,
            'admitted' => (boolean) $this->admitted,
            'description' => $this->description,
            'note' => $this->note,
            'user_create_id' => $this->user_create_id,
            'user_update_id' => $this->user_update_id,
            'user_admit_id' => $this->user_admit_id,
            'user_delete_id' => $this->user_delete_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'admitted_at' => $this->admitted_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
