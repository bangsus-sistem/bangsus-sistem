<?php

namespace App\Http\Requests\Ajax\Hrm\Attendance;

use App\Http\Requests\FeatureIdRequest;
use Illuminate\Validation\Rule;
use App\Models\Hrm\{
    Attendance,
    AttendanceType,
};
use App\Models\System\Branch;
use App\Models\Storage\Image;
use App\Validation\Hrm\Attendance\{
    ValidEmployeeAndBranchRule,
    ValidScheduleInDatetimeRule,
};

class AmendRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'attendance',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return Attendance::class;
    }

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [
            'employee_id' => [
                'required',
                new ValidEmployeeAndBranchRule($this),
            ],
            'branch_id' => [
                'required',
                'bsb_exists:'.Branch::class,
            ],
            'attendance_type_id' => [
                'required',
                'bsb_exists:'.AttendanceType::class,
            ],
            'image_id' => [
                'nullable',
                'bsb_exists:'.Image::class,
            ],
            'schedule_in_datetime' => [
                'nullable',
                new ValidScheduleInDatetimeRule($this),
            ],
            'schedule_out_datetime' => [
                'nullable',
                'after:schedule_in_datetime',
            ],
            'attendance_in_datetime' => [
                'nullable',
            ],
            'attendance_out_datetime' => [
                'nullable',
                'after:attendance_in_datetime',
            ],
        ];
    }
}
