<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWebsiteRequest;
use App\Models\Website;
use App\Services\Interfaces\WebsiteServiceInterface;
use App\Services\WebsiteServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{

    /**
     * @param  WebsiteServices  $websiteService
     */
    public function __construct(private WebsiteServiceInterface $websiteService)
    {
    }

    /**
     * @param  StoreWebsiteRequest  $request
     * @return JsonResponse
     */
    public function store(StoreWebsiteRequest $request): JsonResponse
    {
        $data = $request->validated();
        $website = $this->websiteService->create($data);

        return JsonResponse::success(compact('website'), 201);
    }
}
