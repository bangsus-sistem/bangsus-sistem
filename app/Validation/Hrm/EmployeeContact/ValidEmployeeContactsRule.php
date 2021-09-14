<?php

namespace App\Validation\Hrm\EmployeeContact;

use Bsb\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Hrm\ContactType;

class ValidEmployeeContactsRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $contactType = ContactType::find($value['contact_type_id']);
        if ( ! $contactType->required) return true;

        $contact = $value['contact'];

        switch (true) {
            case is_null($contact) || strlen($contact) <= 0 :
                $this->setMessage('Kontak tidak boleh kosong.');
                return false;
                break;
            case strlen($contact) > 1000 :
                $this->setMessage('Kontak tidak boleh lebih dari 1000 karakter.');
                return false;
                break;
        }

        return true;
    }
}
