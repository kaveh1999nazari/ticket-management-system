<?php

namespace App\Service;

use App\Models\TicketReply;
use App\Repository\TicketReplyRepository;

class TicketReplyService
{
    public function __construct(
        private readonly TicketReplyRepository $ticketReplyRepository
    )
    {
    }

    public function create(array $data): TicketReply
    {
        return $this->ticketReplyRepository->create($data);
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
}
