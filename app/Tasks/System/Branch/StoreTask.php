<?php

namespace App\Tasks\System\Branch;

use Bsb\Foundation\Task;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $branch = new Branch;
        $this->transaction(
            function () use ($request, $branch) {
                $branch->code = $request->input('code');
                $branch->name = $request->input('name');
                $branch->branch_type_id = $request->input('branch_type_id');
                $branch->active = true;
                $branch->description = $request->input('description');
                $branch->note = $request->input('note');
                $branch->save();
            }
        );

        return $branch;
    }
}