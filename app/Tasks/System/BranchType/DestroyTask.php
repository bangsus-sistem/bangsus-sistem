<?php

namespace App\Tasks\System\BranchType;

use Bsb\Foundation\Task;
use App\Models\System\BranchType;

class DestroyTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function handle($request)
    {
        $branchType = BranchType::findOrFail($request->input('id'));
        $this->transaction(fn () => $branchType->delete());
    }
}
