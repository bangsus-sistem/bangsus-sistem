<?php

namespace App\Observers\Penalty;

use Bsb\Foundation\Observer;
use App\Models\Penalty\CommonPenalty;

class CommonPenaltyObserver extends Observer
{
    /**
     * @param  \Illuminate\Database\Eloquent\Model  $commonPenalty
     * @return void
     */
    public static function saving($commonPenalty)
    {
        $commonPenalty->code = $commonPenalty->generateCode();

        return true;
    }
}
