<?php

namespace App\Tasks\System\Branch;

use Bsb\Foundation\Task;
use App\Models\System\Branch;

class ReviseActivationTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $state = true)
    {
        $branch = Branch::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $branch, $state) {
                $branch->active = $state;
                $branch->save();
            }
        );

        return $branch;
    }
}
