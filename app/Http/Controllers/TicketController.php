<?php

namespace App\Http\Controllers;

use App\Exceptions\TicketNotFoundException;
use App\Http\Requests\TicketCreateRequest;
use App\Http\Requests\TicketUpdateRequest;
use App\Service\TicketService;
use Illuminate\Http\JsonResponse;

class TicketController extends Controller
{
    public function __construct(
        private readonly TicketService $ticketService
    )
    {
    }

    public function create(TicketCreateRequest $request): JsonResponse
    {
        $ticket = $this->ticketService->create($request->validated());
        return response()->json([
            'ticket' => $ticket->id
        ]);
    }

    public function list(): JsonResponse
    {
        return response()->json($this->ticketService->list());
    }

    public function get(int $id): JsonResponse
    {
        return response()->json($this->ticketService->get($id));
    }

    public function update(TicketUpdateRequest $request): JsonResponse
    {
        return response()->json($this->ticketService->update($request->validated()));
    }

    /**
     * @throws TicketNotFoundException
     */
    public function listReplies(int $id): JsonResponse
    {
        return response()->json($this->ticketService->listReplies($id));
    }

}
