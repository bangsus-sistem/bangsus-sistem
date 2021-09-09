<?php

namespace App\Tasks\Ajax\System\Branch;

use Bsb\Foundation\Task;

class AmendTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $branch = Branch::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $branch) {
                $branch->code = $request->input('code');
                $branch->name = $request->input('name');
                $branch->branch_type_id = $request->input('branch_type_id');
                $branch->active = $request->boolean('active');
                $branch->description = $request->input('description');
                $branch->note = $request->input('note');
                $branch->save();
            }
        );

        return $branch;
    }
}
