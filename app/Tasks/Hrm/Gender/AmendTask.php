<?php

namespace App\Tasks\Hrm\Gender;

use Bsb\Foundation\Task;
use App\Models\Hrm\Gender;

class AmendTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $gender = Gender::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $gender) {
                $gender->code = $request->input('code');
                $gender->name = $request->input('name');
                $gender->description = $request->input('description');
                $gender->note = $request->input('note');
                $gender->save();
            }
        );

        return $gender;
    }
}
