<?php

namespace App\Service;

use App\Models\Ticket;
use App\Repository\TicketRepository;

class TicketService
{
    public function __construct(
        private readonly TicketRepository $ticketRepository
    )
    {
    }

    public function create(array $data): Ticket
    {
        return $this->ticketRepository->create($data);
    }

    public function list(int $userId): array
    {
        return $this->ticketRepository->list($userId);
    }

    public function get(int $id): Ticket
    {
        return $this->ticketRepository->get($id);
    }

    public function update(array $data): int
    {
        return $this->ticketRepository->update($data);
    }

    public function delete(int $id): int
    {
        return $this->ticketRepository->delete($id);
    }
}
