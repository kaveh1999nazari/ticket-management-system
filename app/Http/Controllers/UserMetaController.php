<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserMetaCreateRequest;
use App\Service\UserMetaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserMetaController
{
    public function __construct(private readonly UserMetaService $userMetaService)
    {
    }

    public function create(UserMetaCreateRequest $request): JsonResponse
    {
        $userMeta = $this->userMetaService->create($request->validated());

        return response()->json($userMeta);
    }

    public function list(): JsonResponse
    {
        $meta = $this->userMetaService->list();
        return response()->json($meta);
    }

    public function delete(int $id): JsonResponse
    {
        $this->userMetaService->delete($id);
        return response()->json();
    }

}
