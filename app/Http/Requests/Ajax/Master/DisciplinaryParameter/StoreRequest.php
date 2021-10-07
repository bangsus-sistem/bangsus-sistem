<?php

namespace App\Http\Requests\Ajax\Master\DisciplinaryParameter;

use App\Http\Requests\FeatureRequest;
use Illuminate\Validation\Rule;
use App\Models\Master\DisciplinaryParameter;

class StoreRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'disciplinary_parameter',
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
                'unique:'.DisciplinaryParameter::class,
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
    protected function prepareForValidation()
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
