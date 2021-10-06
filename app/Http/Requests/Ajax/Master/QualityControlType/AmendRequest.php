<?php

namespace App\Http\Requests\Ajax\Master\QualityControlType;

use App\Http\Requests\FeatureIdRequest;
use Illuminate\Validation\Rule;
use App\Models\Master\{
    QualityControlType,
    QualityControlParameter,
    QualityControlValue,
};

class AmendRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'quality_control_type',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return QualityControlType::class;
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
                Rule::unique(QualityControlType::class, 'code')
                    ->ignore($this->input('id')),
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
            'quality_control_parameters.*.id' => [
                'nullable',
                'bsb_exists:'.QualityControlParameter::class,
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
            'quality_control_parameters.*.quality_control_values.*.id' => [
                'nullable',
                'bsb_exists:'.QualityControlValue::class,
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
