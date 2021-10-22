<?php

namespace App\Models\Hrm;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use Bsb\Foundation\Database\Eloquent\Extent;
use App\Models\Concerns\{
    HasUserTimestamps,
    HasUserAdmit,
    HasUserDelete,
    AdmittedTimestamp,
};

class EmployeeMutation extends Model
{
    use Extent;
    use SoftDeletes, HasUserTimestamps, HasUserAdmit, HasUserDelete,
        AdmittedTimestamp;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employeeAssignment()
    {
        return $this->belongsTo(EmployeeAssignment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class);
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUserAuthorized($query)
    {
        return $query->whereHas('employeeAssignment',
            fn ($query) => $query->userAuthorized()
        );
    }
}
