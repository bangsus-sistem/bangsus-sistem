<?php

namespace App\Http\Controllers\Ajax\Auth;

use Bsb\Foundation\Http\Controller;
use App\Models\Auth\User;
use Illuminate\Http\Request;
use App\Http\Requests\Ajax\Auth\User\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    AmendRequest,
    ReviseActivationRequest,
    RevisePasswordRequest,
    DestroyRequest,
};
use App\Tasks\Auth\User\{
    StoreTask,
    AmendTask,
    ReviseActivationTask,
    RevisePasswordTask,
};
use App\Transformer\SingleCollections\Auth\UserSingleCollection;
use App\Transformer\PaginatedCollections\Auth\UserPaginatedCollection;
use App\Transformer\RelatedResources\Auth\UserRelatedResource;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(new UserSingleCollection(User::all()), 200);
    }

    /**
     * @param  \App\Http\Requests\Ajax\Auth\User\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new UserPaginatedCollection(
                User::where(
                    $this->buildWhere()
                        ->with($request)
                        ->index('username')->mode('string')
                        ->index('full_name')->mode('string')
                        ->index('role_id')->mode('id')
                        ->index('active')->mode('boolean')
                        ->index('all_branches')->mode('boolean')
                        ->done()
                )
                    ->orderBy($request->input('sort'), $request->input('order'))
                    ->paginate($request->input('count'))
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Auth\User\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, $id)
    {
        return response()->json(
            new UserRelatedResource(User::findOrFail($id)),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Auth\User\StoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new UserRelatedResource($this->transmit(new StoreTask, $request)),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Auth\User\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new UserRelatedResource($this->transmit(new AmendTask, $request)),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Auth\User\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseActivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new UserRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, true)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Auth\User\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseDeactivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new UserRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, false)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Auth\User\RevisePasswordRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function revisePassword(RevisePasswordRequest $request)
    {
        return response()->json(
            new UserRelatedResource(
                $this->transmit(new RevisePasswordTask, $request, false)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Auth\User\DestroyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyRequest $request)
    {
        $role = User::findOrFail($request->input('id'));
        $this->transaction(fn () => $role->delete());
        return response()->noContent();
    }
}
