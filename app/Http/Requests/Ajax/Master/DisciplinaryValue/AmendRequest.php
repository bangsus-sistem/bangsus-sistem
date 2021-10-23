<?php

namespace App\Http\Requests\Ajax\Master\DisciplinaryValue;

use App\Http\Requests\FeatureIdRequest;
use Illuminate\Validation\Rule;
use App\Models\Master\DisciplinaryValue;

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
        return DisciplinaryValue::class;
    }

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [
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
