<?php

namespace App\Tasks\Master\OperationalPhotoType;

use Bsb\Foundation\Task;
use App\Models\Master\OperationalPhotoType;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $operationalPhotoType = new OperationalPhotoType;
        $this->transaction(
            function () use ($request, $operationalPhotoType) {
                $operationalPhotoType->code = $request->input('code');
                $operationalPhotoType->name = $request->input('name');
                $operationalPhotoType->active = true;
                $operationalPhotoType->description = $request->input('description');
                $operationalPhotoType->note = $request->input('note');
                $operationalPhotoType->save();
            }
        );

        return $operationalPhotoType;
    }
}
