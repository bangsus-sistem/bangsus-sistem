<?php

namespace App\Transformer\PaginatedResources\Hrm;

use Bsb\Foundation\Transformer\PaginatedResource;
use App\Transformer\PaginatedResources\System\BranchPaginatedResource;
use App\Transformer\SingleResources\Storage\ImageSingleResource;

class AttendancePaginatedResource extends PaginatedResource
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
            'image' => new ImageSingleResource($this->image),
            'position' => $this->position,
            'attendance_date' => $this->attendance_date,
            'schedule_in_datetime' => $this->schedule_in_datetime,
            'attendance_in_datetime' => $this->attendance_in_datetime,
            'schedule_out_datetime' => $this->schedule_out_datetime,
            'attendance_out_datetime' => $this->attendance_out_datetime,
        ];
    }
}
