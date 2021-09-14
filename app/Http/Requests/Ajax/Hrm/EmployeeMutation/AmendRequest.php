<?php

namespace App\Http\Requests\Ajax\Hrm\EmployeeMutation;

use App\Http\Requests\FeatureIdRequest;
use Illuminate\Validation\Rule;
use App\Models\Hrm\JobTitle;
use App\Validation\Callbacks\RequiredIf\EmployeeMutationIsNotAdmittedCallback;

class AmendRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'employee_mutation',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return EmployeeMutation::class;
    }

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [
            'job_title_id' => [
                Rule::requiredIf(
                    EmployeeMutationIsNotAdmittedCallback::run($this)
                ),
                'wbl_exists:'.JobTitle::class,
            ],
            'start_date' => [
                Rule::requiredIf(
                    EmployeeMutationIsNotAdmittedCallback::run($this)
                ),
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
