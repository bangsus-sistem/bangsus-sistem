<?php

namespace App\Tasks\Hrm\ContactType;

use Bsb\Foundation\Task;
use App\Models\Hrm\ContactType;

class DestroyTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function handle($request)
    {
        $contactType = ContactType::findOrFail($request->input('id'));
        $this->transaction(fn () => $contactType->delete());
    }
}
