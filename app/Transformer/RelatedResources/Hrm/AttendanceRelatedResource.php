<?php

namespace App\Transformer\RelatedResources\Hrm;

use Bsb\Foundation\Transformer\RelatedResource;
use App\Transformer\SingleResources\Hrm\{
    EmployeeSingleResource,
    AttendanceTypeSingleResource,
};
use App\Transformer\SingleResources\System\BranchSingleResource;
use App\Transformer\SingleResources\Storage\ImageSingleResource;
use App\Transformer\SingleResources\Auth\UserSingleResource;

class AttendanceRelatedResource extends RelatedResource
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
            'attendance_type' => new AttendanceTypeSingleResource($this->attendanceType),
            'image' => new ImageSingleResource($this->image),
            'attendance_date' => $this->attendance_date,
            'schedule_in_datetime' => $this->schedule_in_datetime,
            'attendance_in_datetime' => $this->attendance_in_datetime,
            'schedule_out_datetime' => $this->schedule_out_datetime,
            'attendance_out_datetime' => $this->attendance_out_datetime,
            'user_create' => new UserSingleResource($this->userCreate),
            'user_update' => new UserSingleResource($this->userUpdate),
            'user_delete' => new UserSingleResource($this->userDelete),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
