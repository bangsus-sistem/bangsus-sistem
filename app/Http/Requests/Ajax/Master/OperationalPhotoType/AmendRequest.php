<?php

namespace App\Http\Requests\Ajax\Master\OperationalPhotoType;

use App\Http\Requests\FeatureIdRequest;
use Illuminate\Validation\Rule;
use App\Models\Master\OperationalPhotoType;

class AmendRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'operational_photo_type',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return OperationalPhotoType::class;
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
                Rule::unique(OperationalPhotoType::class, 'code')
                    ->ignore($this->input('id')),
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
