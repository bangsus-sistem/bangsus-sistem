<?php

namespace App\Models\Hrm;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use Illuminate\Support\Str;
use Bsb\Foundation\Database\Eloquent\Extent;
use App\Models\Concerns\{
    HasUserTimestamps,
    HasUserAdmit,
    HasUserDelete,
    AdmittedTimestamp,
};
use App\Models\System\Branch;

class Employee extends Model
{
    use Extent;
    use SoftDeletes, HasUserTimestamps, HasUserAdmit, HasUserDelete,
        AdmittedTimestamp;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employeeAssignments()
    {
        return $this->hasMany(EmployeeAssignment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employeeAddresses()
    {
        return $this->hasMany(EmployeeAddress::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employeeContacts()
    {
        return $this->hasMany(EmployeeContact::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employeePhotos()
    {
        return $this->hasMany(EmployeePhoto::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bloodType()
    {
        return $this->belongsTo(BloodType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function firstBranch()
    {
        return $this->belongsTo(Branch::class, 'first_branch_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function firstJobTitle()
    {
        return $this->belongsTo(JobTitle::class, 'first_job_title_id', 'id');
    }

    /**
     * @return string
     */
    public function generateCode()
    {
        $branch = Branch::find($this->first_branch_id);
        $startDate = $this->start_date;

        $increment = 1;
        $code = static::assembleCode($branch, $startDate, $increment);
        while (Employee::where('code', $code)->exists()) {
            $increment++;
            $code = static::assembleCode($branch, $startDate, $increment);
        }

        return $code;
    }

    /**
     * @param  mixed  $branch
     * @param  string  $startDate
     * @param  int  $increment
     * @return string
     */
    public static function assembleCode($branch, $startDate, int $increment)
    {
        $branchCode = $branch->code;
        $dateCode = date('Ymd', strtotime($startDate));

        return $branchCode . $dateCode . Str::padLeft((string) $increment, 3, '0');
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUserAuthorized($query)
    {
        return $query->whereHas('employeeAssignments',
            fn ($query) => $query->userAuthorized()
        );
    }
}
