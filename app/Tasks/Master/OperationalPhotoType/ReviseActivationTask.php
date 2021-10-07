<?php

namespace App\Tasks\Master\OperationalPhotoType;

use Bsb\Foundation\Task;
use App\Models\Master\OperationalPhotoType;

class ReviseActivationTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $state = true)
    {
        $operationalPhotoType = OperationalPhotoType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $operationalPhotoType, $state) {
                $operationalPhotoType->active = $state;
                $operationalPhotoType->save();
            }
        );

        return $operationalPhotoType;
    }
}
