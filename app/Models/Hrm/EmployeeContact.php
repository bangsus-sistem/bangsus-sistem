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

class EmployeeContact extends Model
{
    use SoftDeletes, HasUserTimestamps, HasUserAdmit, HasUserDelete,
        HasEmployee, AdmittedTimestamp;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contactType()
    {
        return $this->hasMany(ContactType::class);
    }
}
