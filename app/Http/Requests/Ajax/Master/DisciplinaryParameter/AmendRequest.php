<?php

namespace App\Http\Requests\Ajax\Master\DisciplinaryParameter;

use App\Http\Requests\FeatureIdRequest;
use Illuminate\Validation\Rule;
use App\Models\Master\{
    DisciplinaryParameter,
    DisciplinaryValue,
};

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
            'disciplinary_values' => [
                'required',
                'array',
                'min:1',
            ],
            'disciplinary_values.*.id' => [
                'nullable',
                'bsb_exists:'.DisciplinaryValue::class,
            ],
            'disciplinary_values.*.name' => [
                'required',
                'max:200',
            ],
            'disciplinary_values.*.expected_value' => [
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

    /**
     * @return void
     */
    protected function additionalPrepareForValidation()
    {
        $disciplinaryValues = [];
        foreach ($this->input('disciplinary_values') as $disciplinaryValue) {
            if ($disciplinaryValue['name'] == '' || is_null($disciplinaryValue['name']))
                continue;
            
            $disciplinaryValues[] = $disciplinaryValue;
        }
        
        $this->merge([
            'disciplinary_values' => $disciplinaryValues,
        ]);
    }
}
