<?php

namespace App\Transformer\PaginatedResources\Log;

use Bsb\Foundation\Transformer\PaginatedResource;
use App\Transformer\SingleResources\Auth\UserSingleResource;
use App\Transformer\RelatedResources\Auth\FeatureRelatedResource;
use App\Transformer\SingleResources\Auth\{
    WidgetSingleResource,
    ReportSingleResource,
};

class ActivityLogPaginatedResource extends PaginatedResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => new UserSingleResource($this->user),
            'activity_log_type' => $this->activity_log_type,
            $this->mergeWhen($this->activity_log_type == 'feature', [
                'feature' => new FeatureRelatedResource($this->activityLog)
            ]),
            $this->mergeWhen($this->activity_log_type == 'widget', [
                'widget' => new WidgetSingleResource($this->activityLog)
            ]),
            $this->mergeWhen($this->activity_log_type == 'report', [
                'report' => new ReportSingleResource($this->activityLog)
            ]),
            'user_delete' => new UserSingleResource($this->userDelete),
            'created_at' => $this->created_at,
        ];
    }
}
