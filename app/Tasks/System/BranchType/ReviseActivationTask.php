<?php

namespace App\Tasks\System\BranchType;

use Bsb\Foundation\Task;
use App\Models\System\BranchType;

class ReviseActivationTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $state = true)
    {
        $branchType = BranchType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $branchType, $state) {
                $branchType->active = $state;
                $branchType->save();
            }
        );

        return $branchType;
    }
}
