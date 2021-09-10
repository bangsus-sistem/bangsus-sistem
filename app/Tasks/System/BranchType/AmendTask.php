<?php

namespace App\Tasks\System\BranchType;

use Bsb\Foundation\Task;

class AmendTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $branchType = BranchType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $branchType) {
                $branchType->code = $request->input('code');
                $branchType->name = $request->input('name');
                $branchType->active = $request->boolean('active');
                $branchType->description = $request->input('description');
                $branchType->note = $request->input('note');
                $branchType->save();
            }
        );

        return $branchType;
    }
}
