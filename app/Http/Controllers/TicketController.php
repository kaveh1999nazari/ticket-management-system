<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketCreateRequest;
use App\Models\Ticket;
use App\Models\UserMeta;
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

}
