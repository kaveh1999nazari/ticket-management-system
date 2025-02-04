<?php

namespace App\Service;

use App\Models\Ticket;
use App\Repository\TicketRepository;

class TicketService
{
    public function __construct(
        private TicketRepository $ticketRepository
    )
    {
    }

    public function create(array $data): Ticket
    {
        return $this->ticketRepository->create($data);
    }

    public function list(int $userId): array
    {

    }

    public function get(int $id): Ticket
    {

    }

    public function update(array $data): int
    {

    }

    public function delete(int $id): int
    {

    }
}
