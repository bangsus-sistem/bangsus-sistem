<?php

namespace App\Http\Requests\Ajax\Hrm\EmployeeAssignment;

use App\Http\Requests\FeatureIdRequest;
use Illuminate\Validation\Rule;
use App\Models\Hrm\{
    EmployeeAssignment,
    JobTitle,
};
use App\Models\System\Branch;
use App\Validation\Callbacks\RequiredIf\EmployeeAssignmentIsNotAdmittedCallback;

class AmendRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'employee_assignment',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return EmployeeAssignment::class;
    }

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [
            'branch_id' => [
                Rule::requiredIf(
                    EmployeeAssignmentIsNotAdmittedCallback::run($this)
                ),
                'bsb_exists:'.Branch::class,
            ],
            'first_job_title_id' => [
                Rule::requiredIf(
                    EmployeeAssignmentIsNotAdmittedCallback::run($this)
                ),
                'bsb_exists:'.JobTitle::class,
            ],
            'start_date' => [
                Rule::requiredIf(
                    EmployeeAssignmentIsNotAdmittedCallback::run($this)
                ),
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
