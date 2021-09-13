<?php

namespace App\Tasks\Hrm\Gender;

use Bsb\Foundation\Task;
use App\Models\Hrm\Gender;

class DestroyTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function handle($request)
    {
        $gender = Gender::findOrFail($request->input('id'));
        $this->transaction(fn () => $gender->delete());
    }
}
