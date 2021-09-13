<?php

namespace App\Tasks\Hrm\BloodType;

use Bsb\Foundation\Task;
use App\Models\Hrm\BloodType;

class DestroyTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function handle($request)
    {
        $bloodType = BloodType::findOrFail($request->input('id'));
        $this->transaction(fn () => $bloodType->delete());
    }
}
