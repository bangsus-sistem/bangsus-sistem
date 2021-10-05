<?php

namespace App\Http\Requests\Ajax\Master\QualityControlType;

use App\Http\Requests\FeatureRequest;
use Illuminate\Validation\Rule;
use App\Models\Master\QualityControlType;

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
                'unique:'.QualityControlType::class,
            ],
            'name' => [
                'required',
                'max:200',
            ],
            'quality_control_parameters' => [
                'required',
                'array',
                'min:1',
            ],
            'quality_control_parameters.*.name' => [
                'required',
                'max:200',
            ],
            'quality_control_parameters.*.quality_control_values' => [
                'required',
                'array',
                'min:1',
            ],
            'quality_control_parameters.*.quality_control_values.*.name' => [
                'required',
                'max:200',
            ],
            'quality_control_parameters.*.quality_control_values.*.expected_value' => [
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
