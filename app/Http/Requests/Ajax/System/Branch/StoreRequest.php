<?php

namespace App\Http\Requests\Ajax\System\Branch;

use App\Http\Requests\FeatureRequest;
use Illuminate\Validation\Rule;
use App\Models\System\{
    Branch,
    BranchType,
};

class StoreRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'branch',
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
                'unique:'.Branch::class,
            ],
            'name' => [
                'required',
                'max:200',
            ],
            'branch_type_id' => [
                'required',
                'bsb_exists:'.BranchType::class,
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
    protected function prepareForValidation()
    {
        $branchType = BranchType::find(
            $this->input('branch_type_id')
        );
        $this->merge([
            'code' => ($branchType != null ? $branchType->code : '').$this->input('code')
        ]);
    }
}
