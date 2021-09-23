<?php

namespace App\Transformer\SingleCollections\Hrm;

use Bsb\Foundation\Transformer\SingleCollection;

class ScheduleSubmissionSingleCollection extends SingleCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return \App\Transformer\SingleResources\Hrm\ScheduleSubmissionSingleResource::class;
    }
}
