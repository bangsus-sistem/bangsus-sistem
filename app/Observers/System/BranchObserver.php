<?php

namespace App\Observers\System;

use Bsb\Foundation\Observer;
use Illuminate\Support\Str;
use App\Models\Auth\User;
use App\Models\Master\{
    OperationalPhotoType,
    MinimumOperationalPhoto,
};

class BranchObserver extends Observer
{
    /**
     * @param  mixed  $branch
     * @return void
     */
    public static function saving($branch)
    {
        

        return true;
    }

    /**
     * @param  mixed  $branch
     * @return void
     */
    public static function saved($branch)
    {
        // Sync user.
        $branch->users()
            ->sync(
                User::where('all_branches', true)
                    ->get()->pluck('id')->all()
            );

        OperationalPhotoType::whereDoesntHave('minimumOperationalPhotos', function ($query) use ($branch) {
            return $query->where('branch_id', $branch->id);
        })
            ->get()
            ->each(function ($operationalPhotoType) use ($branch) {
                $minimumOperationalPhoto = new MinimumOperationalPhoto;
                $minimumOperationalPhoto->operational_photo_type_id = $operationalPhotoType->id;
                $minimumOperationalPhoto->branch_id = $branch->id;
                $minimumOperationalPhoto->minimum = 0;
                $minimumOperationalPhoto->save();
            });
    }
    
    /**
     * @param  mixed  $branch
     * @return void
     */
    public static function forceDeleting()
    {
        $branch->users()->detach();
    }
}
