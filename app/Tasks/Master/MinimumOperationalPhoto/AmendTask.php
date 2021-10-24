<?php

namespace App\Tasks\Master\MinimumOperationalPhoto;

use Bsb\Foundation\Task;
use App\Models\Master\{
    OperationalPhotoType,
    MinimumOperationalPhoto,
};

class AmendTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $operationalPhotoType = OperationalPhotoType::find($request->input('operational_photo_type_id'));
        $minimumOperationalPhotos = $operationalPhotoType->minimumOperationalPhotos();

        $this->transaction(
            function () use ($request, $minimumOperationalPhotos) {
                $minimumOperationalPhotos->each(function ($minimumOperationalPhoto) use ($request) {
                    $minimum = collect($request->input('minimum'))
                        ->where('branch_id', $minimumOperationalPhoto->branch_id)
                        ->first();
                    
                    $minimumOperationalPhoto->minimum = $minimum['minimum'];
                    $minimumOperationalPhoto->save();
                });
            }
        );

        return $operationalPhotoType;
    }
}
