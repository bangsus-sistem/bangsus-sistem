<?php

namespace App\Tasks\Hrm\BloodType;

use Bsb\Foundation\Task;
use App\Models\Hrm\BloodType;

class ReviseActivationTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $state = true)
    {
        $bloodType = BloodType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $bloodType, $state) {
                $bloodType->active = $state;
                $bloodType->save();
            }
        );

        return $bloodType;
    }
}
