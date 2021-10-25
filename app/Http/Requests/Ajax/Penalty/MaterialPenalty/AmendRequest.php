<?php

namespace App\Http\Requests\Ajax\Penalty\MaterialPenalty;

use App\Http\Requests\FeatureIdRequest;
use Illuminate\Validation\Rule;
use App\Models\Penalty\MaterialPenalty;
use App\Models\System\Branch;

class AmendRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'material_penalty',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return MaterialPenalty::class;
    }

    /**
     * @return array
     */
    public function additionalRules()
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
