<?php

namespace App\Observers\Penalty;

use Bsb\Foundation\Observer;
use App\Models\Penalty\MaterialPenalty;

class MaterialPenaltyObserver extends Observer
{
    /**
     * @param  \Illuminate\Database\Eloquent\Model  $materialPenalty
     * @return void
     */
    public static function saving($materialPenalty)
    {
        $materialPenalty->code = $materialPenalty->generateCode();

        return true;
    }
}
