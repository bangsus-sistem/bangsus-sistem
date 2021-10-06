<?php

namespace App\Tasks\Master\QualityControlType;

use Bsb\Foundation\Task;
use App\Models\Master\QualityControlType;

class ReviseActivationTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $state = true)
    {
        $qualityControlType = QualityControlType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $qualityControlType, $state) {
                $qualityControlType->active = $state;
                $qualityControlType->save();
            }
        );

        return $qualityControlType;
    }
}
