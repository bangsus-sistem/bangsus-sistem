<?php

namespace App\Transformer\SingleResources\Hrm;

use Bsb\Foundation\Transformer\SingleResource;

class AttendanceSingleResource extends SingleResource
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
            'attendance_type_id' => $this->attendance_type_id,
            'schedule_date' => $this->schedule_date,
            'schedule_in_datetime' => $this->schedule_in_datetime == null ? null : $this->schedule_in_datetime->toRfc3339String(),
            'schedule_out_datetime' => $this->schedule_out_datetime == null ? null : $this->schedule_out_datetime->toRfc3339String(),
            'admitted' => (bool) $this->admitted,
            'user_create_id' => $this->user_create_id,
            'user_update_id' => $this->user_update_id,
            'user_delete_id' => $this->user_delete_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
