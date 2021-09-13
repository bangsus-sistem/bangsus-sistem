<?php

namespace App\Http\Requests\Ajax\Hrm\Gender;

use App\Http\Requests\FeatureRequest;
use Illuminate\Validation\Rule;
use App\Models\Hrm\Gender;

class StoreRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'gender',
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
                'unique:'.Gender::class,
            ],
            'name' => [
                'required',
                'max:200',
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
