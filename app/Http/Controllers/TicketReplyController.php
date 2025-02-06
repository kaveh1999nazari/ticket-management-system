<?php

namespace App\Http\Controllers;

use App\Exceptions\TicketReplyNotAccess;
use App\Http\Requests\TicketReplyCreateRequest;
use App\Service\TicketReplyService;
use Illuminate\Http\JsonResponse;

class TicketReplyController extends Controller
{
    public function __construct(
        private readonly TicketReplyService $ticketReplyService
    )
    {
    }

    /**
     * @throws TicketReplyNotAccess
     */
    public function create(TicketReplyCreateRequest $request, int $ticketId): JsonResponse
    {
        $ticketReply = $this->ticketReplyService->create($request->validated(), $ticketId);
        return response()->json([
            'id' => $ticketReply->id
        ]);
    }
}
