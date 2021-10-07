<?php

namespace App\Tasks\Master\OperationalPhotoType;

use Bsb\Foundation\Task;
use App\Models\Master\OperationalPhotoType;

class AmendTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $operationalPhotoType = OperationalPhotoType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $operationalPhotoType) {
                $operationalPhotoType->code = $request->input('code');
                $operationalPhotoType->name = $request->input('name');
                $operationalPhotoType->description = $request->input('description');
                $operationalPhotoType->note = $request->input('note');
                $operationalPhotoType->save();
            }
        );

        return $operationalPhotoType;
    }
}
