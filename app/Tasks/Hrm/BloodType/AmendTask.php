<?php

namespace App\Tasks\Hrm\BloodType;

use Bsb\Foundation\Task;
use App\Models\Hrm\BloodType;

class AmendTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $bloodType = BloodType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $bloodType) {
                $bloodType->code = $request->input('code');
                $bloodType->name = $request->input('name');
                $bloodType->description = $request->input('description');
                $bloodType->note = $request->input('note');
                $bloodType->save();
            }
        );

        return $bloodType;
    }
}
