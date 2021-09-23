<?php

namespace App\Http\Requests\Ajax\Hrm\ScheduleSubmission;

use App\Http\Requests\FeatureRequest;
use Illuminate\Validation\Rule;
use App\Models\System\Branch;
use App\Models\Hrm\AttendanceType;
use App\Models\Storage\Image;
use App\Validation\Hrm\ScheduleSubmission\{
    ValidEmployeeAndBranchRule,
    ValidScheduleInDatetimeRule,
};

class StoreRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'schedule_submission',
        'action' => 'create',
    ];

    /**
     * @return array
     */
    public function rules()
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
            'schedule_in_datetime' => [
                'nullable',
                new ValidScheduleInDatetimeRule($this),
            ],
            'schedule_out_datetime' => [
                'nullable',
                'after:schedule_in_datetime',
            ],
        ];
    }
}
