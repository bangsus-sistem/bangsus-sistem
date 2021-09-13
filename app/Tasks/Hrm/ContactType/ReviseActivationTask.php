<?php

namespace App\Tasks\Hrm\ContactType;

use Bsb\Foundation\Task;
use App\Models\Hrm\ContactType;

class ReviseActivationTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $state = true)
    {
        $contactType = ContactType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $contactType, $state) {
                $contactType->active = $state;
                $contactType->save();
            }
        );

        return $contactType;
    }
}
