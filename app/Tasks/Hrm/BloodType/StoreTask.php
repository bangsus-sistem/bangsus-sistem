<?php

namespace App\Tasks\Hrm\BloodType;

use Bsb\Foundation\Task;
use App\Models\Hrm\BloodType;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $bloodType = new BloodType;
        $this->transaction(
            function () use ($request, $bloodType) {
                $bloodType->name = $request->input('name');
                $bloodType->active = true;
                $bloodType->description = $request->input('description');
                $bloodType->note = $request->input('note');
                $bloodType->save();
            }
        );

        return $bloodType;
    }
}
