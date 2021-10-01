<?php

namespace App\Tasks\Master\MarketingItem;

use Bsb\Foundation\Task;
use App\Models\Master\MarketingItem;

class ReviseActivationTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $state
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($request, $state = true)
    {
        $marketingItem = MarketingItem::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $marketingItem, $state) {
                $marketingItem->active = $state;
                $marketingItem->save();
            }
        );

        return $marketingItem;
    }
}
