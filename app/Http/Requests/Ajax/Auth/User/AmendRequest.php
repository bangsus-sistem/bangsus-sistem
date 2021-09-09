<?php

namespace App\Http\Requests\Auth\User;

use App\Http\Requesst\FeatureIdRequest;
use Illuminate\Validation\Rule;
use App\Models\Auth\{
    Role,
    User
};
use App\Models\System\Branch;

class AmendRequest extends FeatureIdRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'user',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return User::class;
    }

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [
            'username' => [
                'required',
                'max:200',
                'alpha_dash',
                Rule::unique(User::class, 'username')->ignore($this->input('id')),
            ],
            'full_name' => [
                'required',
                'max:200',
            ],
            'role_id' => [
                'required',
                'wbl_exists:'.Role::class,
            ],
            'description' => [
                'nullable',
                'max:1000',
            ],
            'note' => [
                'nullable',
                'max:1000',
            ],
            'all_branches' => [
                'required',
                'boolean',
            ],
            'branch_ids' => [
                Rule::requiredIf( ! $this->boolean('all_branches')),
                'array',
            ],
            'branch_ids.*' => [
                Rule::requiredIf( ! $this->boolean('all_branches')),
                'wbl_exists:'.Branch::class,
            ],
        ];
    }
}
