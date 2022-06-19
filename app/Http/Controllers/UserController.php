<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\UserServices;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * @param  UserServices  $userService
     */
    public function __construct(private UserServiceInterface $userService)
    {
    }

    /**
     * @param  CreateUserRequest  $request
     * @return JsonResponse
     */
    public function signUp(CreateUserRequest $request): JsonResponse
    {
        $data = $request->validated();
        $user = $this->userService->create($data);

        return JsonResponse::success(compact('user'), 201);
    }
}
