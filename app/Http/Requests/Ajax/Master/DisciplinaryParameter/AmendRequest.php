<?php

namespace App\Http\Requests\Ajax\Master\DisciplinaryParameter;

use App\Http\Requests\FeatureIdRequest;
use Illuminate\Validation\Rule;
use App\Models\Master\DisciplinaryParameter;

class AmendRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'disciplinary_parameter',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return DisciplinaryParameter::class;
    }

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [
            'code' => [
                'required',
                'max:200',
                Rule::unique(DisciplinaryParameter::class, 'code')
                    ->ignore($this->input('id')),
            ],
            'name' => [
                'required',
                'max:200',
            ],
            'discplinary_values' => [
                'required',
                'array',
                'min:1',
            ],
            'discplinary_values.*.name' => [
                'required',
                'max:200',
            ],
            'discplinary_values.*.expected_value' => [
                'required',
                'boolean',
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
