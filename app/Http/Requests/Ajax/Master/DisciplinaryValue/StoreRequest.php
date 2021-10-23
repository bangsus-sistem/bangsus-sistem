<?php

namespace App\Http\Requests\Ajax\Master\DisciplinaryValue;

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
        'action' => 'update',
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'disciplinary_parameter_id' => [
                'required',
                'bsb_exists:'.DisciplinaryParameter::class,
            ],
            'name' => [
                'required',
                'max:200',
            ],
            'expected_value' => [
                'required',
                'boolean',
            ],
        ];
    }
}
