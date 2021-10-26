<?php

namespace App\Http\Requests\Ajax\System\Branch;

use App\Http\Requests\FeatureIdRequest;
use Illuminate\Validation\Rule;
use App\Models\System\{
    Branch,
    BranchType,
};

class AmendRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'branch',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return Branch::class;
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
                Rule::unique(Branch::class, 'code')
                    ->ignore($this->input('id')),
            ],
            'name' => [
                'required',
                'max:200',
            ],
            'branch_type_id' => [
                'required',
                'bsb_exists:'.BranchType::class,
            ],
            'off_day' => [
                'required',
                'numeric',
                'between:0,31',
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

    /**
     * @return void
     */
    protected function additionalPrepareForValidation()
    {
        $branchType = BranchType::find(
            $this->input('branch_type_id')
        );
        $this->merge([
            'code' => ($branchType != null ? $branchType->code : '').$this->input('code')
        ]);
    }
}
