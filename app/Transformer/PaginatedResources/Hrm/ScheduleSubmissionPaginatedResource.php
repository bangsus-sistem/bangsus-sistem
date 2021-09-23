<?php

namespace App\Transformer\PaginatedResources\Hrm;

use Bsb\Foundation\Transformer\PaginatedResource;
use App\Transformer\PaginatedResources\System\BranchPaginatedResource;

class ScheduleSubmissionPaginatedResource extends PaginatedResource
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
            'attendance_type' => new AttendanceTypePaginatedResource($this->attendanceType),
            'schedule_date' => $this->schedule_date,
            'schedule_in_datetime' => $this->schedule_in_datetime,
            'schedule_out_datetime' => $this->schedule_out_datetime,
            'admitted' => (bool) $this->admitted,
            'monthly' => (bool) $this->monthly,
        ];
    }
}
