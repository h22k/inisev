<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    /**
     * @param  SubscribeRequest  $request
     * @param  User  $user
     * @return JsonResponse
     */
    public function __invoke(SubscribeRequest $request, User $user): JsonResponse
    {
        $websiteId = $request->validated('website_id');

        $subscription = $user->addSubscribe((int) $websiteId);

        return JsonResponse::success([
            'subscription' => $subscription->load(['user', 'website'])
        ], 201);
    }
}
