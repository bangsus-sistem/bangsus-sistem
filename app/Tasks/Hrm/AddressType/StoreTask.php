<?php

namespace App\Tasks\Hrm\AddressType;

use Bsb\Foundation\Task;
use App\Models\Hrm\AddressType;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $addressType = new AddressType;
        $this->transaction(
            function () use ($request, $addressType) {
                $addressType->code = $request->input('code');
                $addressType->name = $request->input('name');
                $addressType->active = true;
                $addressType->required = $request->boolean('required');
                $addressType->description = $request->input('description');
                $addressType->note = $request->input('note');
                $addressType->save();
            }
        );

        return $addressType;
    }
}
