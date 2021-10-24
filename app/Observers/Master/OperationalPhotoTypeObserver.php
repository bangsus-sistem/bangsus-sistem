<?php

namespace App\Observers\Master;

use Bsb\Foundation\Observer;
use Illuminate\Support\Str;
use App\Models\Auth\User;
use App\Models\System\Branch;
use App\Models\Master\MinimumOperationalPhoto;

class OperationalPhotoTypeObserver extends Observer
{
    /**
     * @param  mixed  $operationalPhotoType
     * @return void
     */
    public static function saving($operationalPhotoType)
    {
        

        return true;
    }

    /**
     * @param  mixed  $operationalPhotoType
     * @return void
     */
    public static function saved($operationalPhotoType)
    {
        Branch::whereDoesntHave('minimumOperationalPhotos', function ($query) use ($operationalPhotoType) {
            return $query->where('operational_photo_type_id', $operationalPhotoType->id);
        })
            ->get()
            ->each(function ($branch) use ($operationalPhotoType) {
                $minimumOperationalPhoto = new MinimumOperationalPhoto;
                $minimumOperationalPhoto->operational_photo_type_id = $operationalPhotoType->id;
                $minimumOperationalPhoto->branch_id = $branch->id;
                $minimumOperationalPhoto->minimum = 0;
                $minimumOperationalPhoto->save();
            });
    }
}
