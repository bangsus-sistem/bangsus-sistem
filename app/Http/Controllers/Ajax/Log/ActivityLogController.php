<?php

namespace App\Http\Controllers\Ajax\Log;

use Bsb\Foundation\Http\Controller;
use App\Models\Log\ActivityLog;
use Illuminate\Http\Request;
use App\Http\Requests\Ajax\Log\ActivityLog\{
    IndexRequest,
    ShowRequest,
    DestroyRequest,
    RevealLatestRequest,
    RevealTrafficRequest,
};
use App\Widgets\Log\ActivityLog\{
    LatestWidget,
    TrafficWidget,
};
use App\Transformer\SingleCollections\Log\ActivityLogSingleCollection;
use App\Transformer\PaginatedCollections\Log\ActivityLogPaginatedCollection;
use App\Transformer\RelatedResources\Log\ActivityLogRelatedResource;

class ActivityLogController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new ActivityLogSingleCollection(ActivityLog::all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Log\ActivityLog\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new ActivityLogPaginatedCollection(
                ActivityLog::where(
                    $this->buildWhere($request)
                        ->with($request)
                        ->index('user_id')->mode('id')
                        ->index('activity_log_type')->mode('strict_string')
                        ->done()
                )
                    ->orderBy($request->input('sort'), $request->input('order'))
                    ->paginate($request->input('count'))
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Log\ActivityLog\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, $id)
    {
        return response()->json(
            new ActivityLogRelatedResource(ActivityLog::findOrFail($id)),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Log\ActivityLog\DestroyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyRequest $request)
    {
        $activityLog = ActivityLog::findOrFail($request->input('id'));
        $this->transaction(fn () => $activityLog->delete());
        return response()->noContent();
    }

    /**
     * @param  \App\Http\Requests\Ajax\Log\ActivityLog\RevealLatestRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function revealLatest(RevealLatestRequest $request)
    {
        return response()->json($this->reveal(new LatestWidget, $request));
    }

    /**
     * @param  \App\Http\Requests\Ajax\Log\ActivityLog\RevealTrafficRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function revealTraffic(RevealTrafficRequest $request)
    {
        return response()->json($this->reveal(new TrafficWidget, $request));
    }
}
