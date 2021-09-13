<?php

namespace App\Tasks\Hrm\Division;

use Bsb\Foundation\Task;
use App\Models\Hrm\Division;

class DestroyTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function handle($request)
    {
        $division = Division::findOrFail($request->input('id'));
        $this->transaction(fn () => $division->delete());
    }
}
