<?php

namespace App\Http\Requests\Ajax\Penalty\MaterialPenalty;

use App\Http\Requests\FeatureRequest;
use Illuminate\Validation\Rule;
use App\Models\Penalty\MaterialPenalty;
use App\Models\System\Branch;

class StoreRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'common_penalty',
        'action' => 'create',
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'month' => [
                'required',
            ],
            'branch_id' => [
                'required',
                'bsb_exists:'.Branch::class,
            ],
            'total' => [
                'required',
                'numeric',
                'between:0,99999999999999999999',
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
