<?php

namespace App\Tasks\Hrm\Gender;

use Bsb\Foundation\Task;
use App\Models\Hrm\Gender;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $gender = Gender;
        $this->transaction(
            function () use ($request, $gender) {
                $gender->code = $request->input('code');
                $gender->name = $request->input('name');
                $gender->active = true;
                $gender->description = $request->input('description');
                $gender->note = $request->input('note');
                $gender->save();
            }
        );

        return $gender;
    }
}
