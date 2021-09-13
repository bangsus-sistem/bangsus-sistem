<?php

namespace App\Tasks\Hrm\Division;

use Bsb\Foundation\Task;
use App\Models\Hrm\Division;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $division = new Division;
        $this->transaction(
            function () use ($request, $division) {
                $division->code = $request->input('code');
                $division->name = $request->input('name');
                $division->active = true;
                $division->description = $request->input('description');
                $division->note = $request->input('note');
                $division->save();
            }
        );

        return $division;
    }
}
