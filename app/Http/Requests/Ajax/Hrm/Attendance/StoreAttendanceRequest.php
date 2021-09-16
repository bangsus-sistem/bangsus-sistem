<?php

namespace App\Http\Requests\Ajax\Hrm\Attendance;

use App\Http\Requests\FeatureRequest;
use Illuminate\Validation\Rule;
use App\Models\System\Branch;
use App\Models\Hrm\AttendanceType;
use App\Models\Storage\Image;

class StoreRequest extends FeatureRequest
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
                new ValidEmployeeAndBranchForAttendance($this),
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
                'date_format:Y-m-d H:i:s',
                new ValidDatetimeForAttendance($this),
            ],
        ];
    }
}
