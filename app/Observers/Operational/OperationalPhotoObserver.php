<?php

namespace App\Observers\Operational;

use Bsb\Foundation\Observer;
use App\Models\Operational\OperationalPhoto;

class OperationalPhotoObserver extends Observer
{
    /**
     * @param  \Illuminate\Database\Eloquent\Model  $operationalPhoto
     * @return void
     */
    public static function saving($operationalPhoto)
    {
        $operationalPhoto->code = $operationalPhoto->generateCode();

        return true;
    }
}
