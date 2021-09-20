<?php

namespace App\Http\Requests\Ajax\Hrm\Attendance;

use App\Http\Requests\FeatureRequest;
use Illuminate\Validation\Rule;
use App\Models\System\Branch;
use App\Models\Hrm\AttendanceType;
use App\Models\Storage\Image;
use App\Validation\Hrm\Attendance\{
    ValidEmployeeAndBranchRule,
    ValidDatetimeRule,
};

class StoreAttendanceRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'attendance',
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
            'image_id' => [
                'required',
                'bsb_exists:'.Image::class,
            ],
            'datetime' => [
                'nullable',
                new ValidDatetimeRule($this),
            ],
            'position' => [
                'required',
                new ValidPositionRule($this),
            ]
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'datetime' => date('Y-m-d H:i:s')
        ]);
    }
}
