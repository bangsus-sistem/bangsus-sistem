<?php

namespace App\Http\Requests\Ajax\Operational\OperationalPhoto;

use App\Http\Requests\FeatureIdRequest;
use Illuminate\Validation\Rule;
use App\Models\Operational\OperationalPhoto;
use App\Models\System\Branch;
use App\Models\Master\OperationalPhotoType;

class AmendRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'common_penalty',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return OperationalPhoto::class;
    }

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [
            'branch_id' => [
                'required',
                'bsb_exists:'.Branch::class,
            ],
            'operational_photo_type_id' => [
                'required',
                'bsb_exists:'.OperationalPhotoType::class,
            ],
            'image_id' => [
                'required',
                'bsb_exists:'.Image::class,
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
