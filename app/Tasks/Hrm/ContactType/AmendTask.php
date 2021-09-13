<?php

namespace App\Tasks\Hrm\ContactType;

use Bsb\Foundation\Task;
use App\Models\Hrm\ContactType;

class AmendTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $contactType = ContactType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $contactType) {
                $contactType->code = $request->input('code');
                $contactType->name = $request->input('name');
                $contactType->required = $request->boolean('required');
                $contactType->description = $request->input('description');
                $contactType->note = $request->input('note');
                $contactType->save();
            }
        );

        return $contactType;
    }
}
