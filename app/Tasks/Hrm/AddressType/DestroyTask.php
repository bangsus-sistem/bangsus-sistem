<?php

namespace App\Tasks\Hrm\AddressType;

use Bsb\Foundation\Task;
use App\Models\Hrm\AddressType;

class DestroyTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function handle($request)
    {
        $addressType = AddressType::findOrFail($request->input('id'));
        $this->transaction(fn () => $addressType->delete());
    }
}
