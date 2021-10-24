<?php

namespace App\Http\Requests\Ajax\Master\OperationalPhotoPenaltyType;

use App\Http\Requests\FeatureIdRequest;
use Illuminate\Validation\Rule;
use App\Models\Master\{
    OperationalPhotoPenaltyType,
    OperationalPhotoType,
};

class AmendRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'operational_photo_penalty_type',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return OperationalPhotoPenaltyType::class;
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
                Rule::unique(OperationalPhotoPenaltyType::class, 'code')
                    ->ignore($this->input('id')),
            ],
            'name' => [
                'required',
                'max:200',
            ],
            'amount' => [
                'required',
                'numeric',
                'between:0,99999999999999999999',
            ],
            'operational_photo_type_id' => [
                'required',
                'bsb_exists:'.OperationalPhotoType::class,
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
