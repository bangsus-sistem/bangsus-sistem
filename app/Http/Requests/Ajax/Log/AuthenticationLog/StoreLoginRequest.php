<?php

namespace App\Http\Requests\Ajax\Log\AuthenticationLog;

use Cheddarboss\Foundation\Http\FormRequest;

class StoreLoginRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'username' => [
                'required',
            ],
            'password' => [
                'required',
            ],
        ];
    }
}
