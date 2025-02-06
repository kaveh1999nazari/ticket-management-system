<?php

namespace App\Service;

use App\Exceptions\TicketNotFoundException;
use App\Models\Ticket;
use App\Repository\TicketRepository;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class TicketService
{
    public function __construct(
        private readonly TicketRepository $ticketRepository
    )
    {
    }

    public function create(array $data): Ticket
    {
        return $this->ticketRepository->create([
            'user_id' => Auth()->id(),
            ...$data
        ]);
    }

    public function list(): Collection
    {
        return $this->ticketRepository->list(Auth()->id());
    }

    public function get(int $id): Ticket
    {
        $userId = auth()->id();
        $ticket = $this->ticketRepository->get($id, $userId);

        if (!$ticket) {
            throw new TicketNotFoundException();
        }

        return $ticket;
    }

    public function update(array $data): int
    {
        return $this->ticketRepository->update($data);
    }

    public function delete(int $id): int
    {
        return $this->ticketRepository->delete($id);
    }

    public function listReplies(int $id)
    {
        $userId = auth()->id();
        $ticket = $this->ticketRepository->listReplies($id, $userId);

        if (!$ticket) {
            throw new TicketNotFoundException();
        }

        return $ticket;
    }
}
