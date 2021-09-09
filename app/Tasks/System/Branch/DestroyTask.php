<?php

namespace App\Tasks\System\Branch;

use Bsb\Foundation\Task;
use App\Models\System\Branch;

class DestroyTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function handle($request)
    {
        $branch = Branch::findOrFail($request->input('id'));
        $this->transaction(fn () => $branch->delete());
    }
}
