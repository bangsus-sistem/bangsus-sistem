<?php

namespace App\Validation\Hrm\EmployeeAddress;

use Bsb\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Hrm\AddressType;

class ValidEmployeeAddressesRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $addressType = AddressType::find($value['address_type_id']);
        if ( ! $addressType->required) return true;

        $address = $value['address'];

        switch (true) {
            case is_null($address) || strlen($address) <= 0 :
                $this->setMessage('Alamat tidak boleh kosong.');
                return false;
                break;
            case strlen($address) > 1000 :
                $this->setMessage('Alamat tidak boleh lebih dari 1000 karakter.');
                return false;
                break;
        }

        return true;
    }
}
