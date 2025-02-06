<?php

namespace App\Service;

use App\Exceptions\TicketReplyNotAccess;
use App\Models\Ticket;
use App\Models\TicketReply;
use App\Repository\TicketReplyRepository;

class TicketReplyService
{
    public function __construct(
        private readonly TicketReplyRepository $ticketReplyRepository
    )
    {
    }

    public function create(array $data, int $ticketId): TicketReply
    {
        $user = Auth()->user();
        $ticket = Ticket::query()
            ->findOrFail($ticketId);

        if(! $this->canReplyToTicket($user, $ticket))
        {
            return throw new TicketReplyNotAccess();
        }

        return $this->ticketReplyRepository->create([
            'user_id' => Auth()->id(),
            'ticket_id' => $ticketId,
            ...$data
        ]);
    }

    public function list(int $ticketId, int $userId): array
    {
        return $this->ticketReplyRepository->list($ticketId, $userId);
    }

    public function get(int $id): TicketReply
    {
        return $this->ticketReplyRepository->get($id);
    }

    public function update(array $data): int
    {
        return $this->ticketReplyRepository->update($data);
    }

    public function delete(int $id): int
    {
        return $this->ticketReplyRepository->delete($id);
    }

    private function canReplyToTicket($user, $ticket): bool
    {
        if(in_array('admin', $user->role))
        {
            return true;
        }

        return $ticket->user_id === $user->id ||
            TicketReply::query()
            ->where('ticket_id', $ticket->id)
            ->where('user_id', '===', $user->id)
            ->exists();
    }
}
