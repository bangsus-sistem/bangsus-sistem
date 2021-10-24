<?php

namespace App\Http\Requests\Ajax\Master\OperationalPhotoPenaltyType;

use App\Http\Requests\FeatureRequest;
use Illuminate\Validation\Rule;
use App\Models\Master\{
    OperationalPhotoPenaltyType,
    OperationalPhotoType,
};

class StoreRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'operational_photo_penalty_type',
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
                'unique:'.OperationalPhotoPenaltyType::class,
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
