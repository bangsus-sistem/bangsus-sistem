<?php

namespace App\Http\Requests\Ajax\Hrm\ScheduleSubmission;

use App\Http\Requests\FeatureRequest;
use Illuminate\Validation\Rule;
use App\Models\System\Branch;
use App\Models\Hrm\AttendanceType;
use App\Models\Storage\Image;
use App\Validation\Hrm\ScheduleSubmission\{
    ValidEmployeesAndBranchRule,
    ValidScheduleInDatetimesRule,
    EmployeeInEmployeesRule,
};

class StoreMonthlyRequest extends FeatureRequest
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
            'employee_ids' => [
                'required',
                'array',
                'min:1',
                new ValidEmployeesAndBranchRule($this),
            ],
            'branch_id' => [
                'required',
                'bsb_exists:'.Branch::class,
            ],
            'attendance_type_id' => [
                'required',
                'bsb_exists:'.AttendanceType::class,
            ],
            'start_date' => [
                'required',
                'date_format:Y-m-d',
            ],
            'end_date' => [
                'required',
                'date_format:Y-m-d',
                'after:start_date',
            ],
            'schedule_submissions' => [
                'required',
                'array',
                'min:1',
            ],
        ];
    }
}
