<?php

namespace App\Tasks\Hrm\AddressType;

use Bsb\Foundation\Task;
use App\Models\Hrm\AddressType;

class ReviseActivationTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $state = true)
    {
        $addressType = AddressType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $addressType, $state) {
                $addressType->active = $state;
                $addressType->save();
            }
        );

        return $addressType;
    }
}
