<?php

namespace App\Http\Requests\Ajax\Auth\Role;

use App\Http\Requests\FeatureRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'role',
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
                'max:3',
                'unique:roles',
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
            'all_features' => [
                'required',
                'boolean',
            ],
            'feature_ids' => [
                Rule::requiredIf( ! $this->boolean('all_features')),
                'array',
            ],
            'feature_ids.*' => [
                Rule::requiredIf( ! $this->boolean('all_features')),
                'bsb_exists:'.Feature::class,
            ],
            'all_widgets' => [
                'required',
                'boolean',
            ],
            'widget_ids' => [
                Rule::requiredIf( ! $this->boolean('all_widgets')),
                'array',
            ],
            'widget_ids.*' => [
                Rule::requiredIf( ! $this->boolean('all_widgets')),
                'bsb_exists:'.Widget::class,
            ],
            'all_reports' => [
                'required',
                'boolean',
            ],
            'report_ids' => [
                Rule::requiredIf( ! $this->boolean('all_reports')),
                'array',
            ],
            'report_ids.*' => [
                Rule::requiredIf( ! $this->boolean('all_reports')),
                'bsb_exists:'.Report::class,
            ],
        ];
    }
}
