<?php

namespace App\Http\Requests\Ajax\Auth\User;

use App\Http\Requests\FeatureRequest;
use Illuminate\Validation\Rule;
use App\Models\Auth\{
    Role,
    User,
};
use App\Models\System\Branch;

class StoreRequest extends FeatureRequest
{
    /**
     * @var array
     */
    protected $refs = [
        'module' => 'user',
        'action' => 'create',
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'username' => [
                'required',
                'max:200',
                'alpha_dash',
                'unique:'.User::class,
            ],
            'full_name' => [
                'required',
                'max:200',
            ],
            'password' => [
                'required',
                'min:6',
            ],
            'password_confirmation' => [
                'required_with:password',
                'same:password',
            ],
            'role_id' => [
                'required',
                'bsb_exists:'.Role::class,
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
                'bsb_exists:'.Branch::class,
            ],
        ];
    }
}
