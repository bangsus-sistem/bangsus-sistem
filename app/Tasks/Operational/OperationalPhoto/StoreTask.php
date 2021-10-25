<?php

namespace App\Tasks\Operational\OperationalPhoto;

use Bsb\Foundation\Task;
use App\Models\Operational\OperationalPhoto;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $operationalPhoto = new OperationalPhoto;
        $this->transaction(
            function () use ($request, $operationalPhoto) {
                $operationalPhoto->transaction_datetime = date('Y-m-d H:i:s');
                $operationalPhoto->branch_id = $request->input('branch_id');
                $operationalPhoto->operational_photo_type_id = $request->input('operational_photo_type_id');
                $operationalPhoto->image_id = $request->input('image_id');
                $operationalPhoto->description = $request->input('description');
                $operationalPhoto->note = $request->input('note');
                $operationalPhoto->save();
            }
        );

        return $operationalPhoto;
    }
}
