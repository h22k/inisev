<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublishPostRequest;
use App\Models\Website;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    /**
     * @param  PublishPostRequest  $request
     * @param  Website  $website
     * @return JsonResponse
     */
    public function __invoke(PublishPostRequest $request, Website $website): JsonResponse
    {
        $data = $request->validated();
        $post = $website->posts()->create($data);

        return JsonResponse::success(compact('post'), 201);
    }
}
