<?php

namespace App\Tasks\Hrm\Division;

use Bsb\Foundation\Task;
use App\Models\Hrm\Division;

class AmendTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $division = Division::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $division) {
                $division->code = $request->input('code');
                $division->name = $request->input('name');
                $division->description = $request->input('description');
                $division->note = $request->input('note');
                $division->save();
            }
        );

        return $division;
    }
}
