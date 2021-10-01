<?php

namespace App\Tasks\Master\MarketingItem;

use Bsb\Foundation\Task;
use App\Models\Master\MarketingItem;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request)
    {
        $marketingItem = new MarketingItem;
        $this->transaction(
            function () use ($request, $marketingItem) {
                $marketingItem->code = $request->input('code');
                $marketingItem->name = $request->input('name');
                $marketingItem->active = true;
                $marketingItem->description = $request->input('description');
                $marketingItem->note = $request->input('note');
                $marketingItem->save();
            }
        );

        return $marketingItem;
    }
}
