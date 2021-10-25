<?php

namespace App\Http\Requests\Ajax\Operational\OperationalPhoto;

use App\Http\Requests\FeatureRequest;
use Illuminate\Validation\Rule;
use App\Models\Operational\OperationalPhoto;
use App\Models\System\Branch;
use App\Models\Master\OperationalPhotoType;
use App\Models\Storage\Image;

class StoreRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'operational_photo',
        'action' => 'create',
    ];

    /**
     * @return array
     */
    public function rules()
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
