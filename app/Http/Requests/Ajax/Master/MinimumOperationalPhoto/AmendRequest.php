<?php

namespace App\Http\Requests\Ajax\Master\MinimumOperationalPhoto;

use App\Http\Requests\FeatureRequest;
use Illuminate\Validation\Rule;
use App\Models\System\Branch;
use App\Models\Master\OperationalPhotoType;

class AmendRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'minimum_operational_photo',
        'action' => 'update',
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'operational_photo_type_id' => [
                'required',
                'bsb_exists:'.OperationalPhotoType::class,
            ],
            'minimum' => [
                'required',
                'array',
            ],
            'minimum.*.branch_id' => [
                'required',
                'bsb_exists:'.Branch::class,
            ],
            'minimum.*.minimum' => [
                'required',
                'numeric',
                'between:0,99999999999999999999',
            ],
        ];
    }
}
