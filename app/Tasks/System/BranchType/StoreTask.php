<?php

namespace App\Tasks\System\BranchType;

use Bsb\Foundation\Task;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $branchType = new BranchType;
        $this->transaction(
            function () use ($request, $branchType) {
                $branchType->code = $request->input('code');
                $branchType->name = $request->input('name');
                $branchType->branch_type_id = $request->input('branch_type_id');
                $branchType->active = true;
                $branchType->description = $request->input('description');
                $branchType->note = $request->input('note');
                $branchType->save();
            }
        );

        return $branchType;
    }
}
