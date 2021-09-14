<?php

namespace App\Http\Requests\Ajax\Hrm\Employee;

use App\Http\Requests\FeatureRequest;
use Illuminate\Validation\Rule;
use App\Models\Hrm\{
    Employee,
    BloodType,
    Gender,
    JobTitle,
};
use App\Models\System\Branch;
use App\Validation\Hrm\EmployeeAddress\ValidEmployeeAddressesRule;
use App\Validation\Hrm\EmployeeContact\ValidEmployeeContactsRule;
use App\Validation\Hrm\EmployeePhoto\ValidEmployeePhotosRule;

class StoreRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'employee',
        'action' => 'create',
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'nik' => [
                'required',
                'size:16',
                'unique:'.Employee::class,
            ],
            'full_name' => [
                'required',
                'max:400',
            ],
            'place_of_birth' => [
                'required',
                'max:200',
            ],
            'date_of_birth' => [
                'required',
                'date',
                'date_format:Y-m-d',
            ],
            'blood_type_id' => [
                'required',
                'bsb_exists:'.BloodType::class,
            ],
            'gender_id' => [
                'required',
                'bsb_exists:'.Gender::class,
            ],
            'first_branch_id' => [
                'required',
                'bsb_exists:'.Branch::class,
            ],
            'first_job_title_id' => [
                'required',
                'bsb_exists:'.JobTitle::class,
            ],
            'start_date' => [
                'required',
                'date',
                'date_format:Y-m-d',
            ],
            'description' => [
                'nullable',
                'max:1000',
            ],
            'note' => [
                'nullable',
                'max:1000',
            ],
            'employee_addresses.*' => [
                new ValidEmployeeAddressesRule($this),
            ],
            'employee_contacts.*' => [
                new ValidEmployeeContactsRule($this),
            ],
            'employee_photos.*' => [
                new ValidEmployeePhotosRule($this),
            ],
        ];
    }
}
