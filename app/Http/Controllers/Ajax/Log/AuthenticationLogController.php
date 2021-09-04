<?php

namespace App\Http\Controllers\Ajax\Log;

use Bsb\Foundation\Http\Controller;
use App\Models\Log\AuthenticationLog;
use Illuminate\Http\Request;
use App\Http\Requests\Ajax\Log\AuthenticationLog\{
    IndexRequest,
    ShowRequest,
    StoreLoginRequest,
    DestroyRequest,
    RevealLatestRequest,
    RevealTrafficRequest,
};
use App\Tasks\Log\AuthenticationLog\StoreTask;
use App\Services\{
    SanctumLoginService,
    SanctumLogoutService,
};
use App\Widgets\Log\AuthenticationLog\{
    LatestWidget,
    TrafficWidget,
};
use App\Transformer\SingleCollections\Log\AuthenticationLogSingleCollection;
use App\Transformer\PaginatedCollections\Log\AuthenticationLogPaginatedCollection;
use App\Transformer\RelatedResources\Log\AuthenticationLogRelatedResource;

class AuthenticationLogController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new AuthenticationLogSingleCollection(AuthenticationLog::all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Log\AuthenticationLog\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new AuthenticationLogPaginatedCollection(
                AuthenticationLog::where(
                    $this->buildWhere($request)
                        ->with($request)
                        ->index('user_id')->mode('id')
                        ->index('state')->mode('boolean')
                        ->done()
                )
                    ->orderBy($request->input('sort'), $request->input('order'))
                    ->paginate($request->input('count'))
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Log\AuthenticationLog\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, $id)
    {
        return response()->json(
            new AuthenticationLogRelatedResource(
                AuthenticationLog::findOrFail($id)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Log\AuthenticationLog\StoreLoginRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeLogin(StoreLoginRequest $request)
    {
        return response()->json(
            new AuthenticationLogRelatedResource(
                $this->transmit(
                    new StoreTask,
                    $request,
                    $this->manage(new SanctumLoginService, $request),
                    true,
                )
            ),
            200
        );
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeLogout(Request $request)
    {
        return response()->json(
            new AuthenticationLogRelatedResource(
                $this->transmit(
                    new StoreTask,
                    $request,
                    $this->manage(new SanctumLogoutService, $request),
                    false,
                )
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Log\DestroyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyRequest $request)
    {
        $authenticationLog = AuthenticationLog::findOrFail(
            $request->input('id')
        );
        $this->transaction(fn () => $authenticationLog->delete());
        return response()->noContent();
    }

    /**
     * @param  \App\Http\Requests\Ajax\Log\AuthenticationLog\RevealLatestRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function revealLatest(RevealLatestRequest $request)
    {
        return response()->json($this->reveal(new LatestWidget, $request));
    }

    /**
     * @param  \App\Http\Requests\Ajax\Log\AuthenticationLog\RevealTrafficRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function revealTraffic(RevealTrafficRequest $request)
    {
        return response()->json($this->reveal(new TrafficWidget, $request));
    }
}
