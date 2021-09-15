<?php

namespace App\Transformer\PaginatedResources\Hrm;

use Bsb\Foundation\Transformer\PaginatedResource;

class EmployeeMutationPaginatedResource extends PaginatedResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'employee_assignment' => new EmployeeAssignmentPaginatedResource($this->employeeAssignment),
            'job_title' => new JobTitlePaginatedResource($this->jobTitle),
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'admitted' => (boolean) $this->admitted,
            'description' => $this->description,
            'note' => $this->note,
        ];
    }
}
