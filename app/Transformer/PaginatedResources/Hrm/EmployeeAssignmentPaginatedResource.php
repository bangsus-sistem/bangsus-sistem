<?php

namespace App\Transformer\PaginatedResources\Hrm;

use Bsb\Foundation\Transformer\PaginatedResource;
use App\Transformer\PaginatedResources\System\BranchPaginatedResource;

class EmployeeAssignmentPaginatedResource extends PaginatedResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'employee' => new EmployeePaginatedResource($this->employee),
            'branch' => new BranchPaginatedResource($this->branch),
            'first_job_title' => new JobTitlePaginatedResource($this->firstJobTitle),
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'base_salary' => (float) $this->base_salary,
            'admitted' => (boolean) $this->admitted,
            'description' => $this->description,
            'note' => $this->note,
        ];
    }
}
