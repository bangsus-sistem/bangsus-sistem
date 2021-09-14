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
    AdmittedTimestamp,
};

class EmployeeAddress extends Model
{
    use SoftDeletes, HasUserTimestamps, HasUserAdmit, HasUserDelete,
        HasEmployee, AdmittedTimestamp;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function addressType()
    {
        return $this->hasMany(AddressType::class);
    }
}
