<?php

namespace App\Http\Requests\Ajax\Hrm\JobTitle;

use App\Http\Requests\FeatureRequest;
use Illuminate\Validation\Rule;
use App\Models\Hrm\{
    JobTitle,
    Division,
};

class StoreRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'job_title',
        'action' => 'create',
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'code' => [
                'required',
                'max:200',
                'unique:'.JobTitle::class,
            ],
            'name' => [
                'required',
                'max:200',
            ],
            'division_id' => [
                'required',
                'wbl_exists:'.Division::class,
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
