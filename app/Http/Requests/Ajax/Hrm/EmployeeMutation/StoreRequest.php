<?php

namespace App\Http\Requests\Ajax\Hrm\EmployeeMutation;

use App\Http\Requests\FeatureRequest;
use Illuminate\Validation\Rule;
use App\Models\Hrm\{
    EmployeeAssignment,
    JobTitle,
};
use App\Validation\Hrm\EmployeeMutation\EmployeeIsMutatableRule;

class StoreRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'employee_assignment',
        'action' => 'create',
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'employee_assignment_id' => [
                'required',
                'bsb_exists:'.EmployeeAssignment::class,
                new EmployeeIsMutatableRule($this),
            ],
            'job_title_id' => [
                'required',
                'bsb_exists:'.JobTitle::class,
            ],
            'start_date' => [
                'required',
                'date',
                'date_format:Y-m-d',
            ],
            'end_date' => [
                'nullable',
                'date',
                'date_format:Y-m-d',
                'after_or_equal:start_date',
            ],
            'description' => [
                'nullable',
                'max:1000',
            ],
            'note' => [
                'nullable',
                'max:1000',
            ],
        ];
    }
}
