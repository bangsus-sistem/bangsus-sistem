<?php

namespace App\Models\Hrm;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Models\Concerns\{
    HasUserTimestamps,
    HasUserAdmit,
    HasUserDelete,
    HasEmployee,
    HasImage,
    AdmittedTimestamp,
};

class EmployeePhoto extends Model
{
    use SoftDeletes, HasUserTimestamps, HasUserAdmit, HasUserDelete,
        HasEmployee, HasImage, AdmittedTimestamp;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employeePhotoType()
    {
        return $this->hasMany(EmployeePhotoType::class);
    }
}
