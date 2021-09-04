<?php

namespace App\Http\Requests\Ajax\Auth\Role;

use App\Http\FeatureIdRequest;
use Illuminate\Validation\Rule;
use App\Models\Auth\Role;

class AmendRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'role',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return Role::class;
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
                'wbl_exists:'.Feature::class,
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
                'wbl_exists:'.Widget::class,
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
                'wbl_exists:'.Report::class,
            ],
        ];
    }
}
