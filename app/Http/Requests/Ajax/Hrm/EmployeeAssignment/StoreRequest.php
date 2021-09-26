<?php

namespace App\Http\Requests\Ajax\Hrm\EmployeeAssignment;

use App\Http\Requests\FeatureRequest;
use Illuminate\Validation\Rule;
use App\Models\Hrm\{
    Employee,
    JobTitle,
};
use App\Models\System\Branch;
use App\Validation\Hrm\EmployeeAssignment\EmployeeIsAssignableRule;

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
            'employee_id' => [
                'required',
                'bsb_exists:'.Employee::class,
                new EmployeeIsAssignableRule($this),
            ],
            'branch_id' => [
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
                'before_or_equal:end_date',
            ],
            'end_date' => [
                'nullable',
                'date',
                'date_format:Y-m-d',
                'after_or_equal:start_date',
            ],
            'base_salary' => [
                'required',
                'numeric',
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
