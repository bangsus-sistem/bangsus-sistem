<?php

namespace App\Transformer\SingleResources\Hrm;

use Bsb\Foundation\Transformer\SingleResource;

class EmployeeAssignmentSingleResource extends SingleResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'employee_id' => $this->employee_id,
            'branch_id' => $this->branch_id,
            'first_job_title_id' => $this->first_job_title_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'base_salary' => (float) $this->base_salary,
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
