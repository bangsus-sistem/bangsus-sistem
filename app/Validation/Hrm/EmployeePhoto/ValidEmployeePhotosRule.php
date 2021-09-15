<?php

namespace App\Validation\Hrm\EmployeePhoto;

use Bsb\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Hrm\EmployeePhotoType;
use App\Models\Storage\Image;

class ValidEmployeePhotosRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $employeePhotoType = EmployeePhotoType::find(
            $value['employee_photo_type_id']
        );
        if ( ! $employeePhotoType->required) return true;

        switch (true) {
            case is_null($value['image_id']) :
                $this->setMessage('Foto tidak boleh kosong.');
                return false;
                break;
            case ! Image::find($value['image_id'])->exists() :
                $this->setMessage('Foto tidak ditemukan.');
                return false;
                break;
        }

        return true;
    }
}
