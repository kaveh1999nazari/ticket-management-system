<?php

namespace App\Repository;

use App\Models\TicketReply;

class TicketReplyRepository
{
    public function create(array $data): TicketReply
    {
        return TicketReply::query()
            ->create($data);
    }

    public function list(int $ticketId, int $userId): array
    {
        return TicketReply::query()
            ->where('ticket_id', $ticketId)
            ->where('user_id', $userId)
            ->first();
    }

    public function get(int $id): TicketReply
    {
        return TicketReply::query()
            ->where('id', $id)
            ->first();
    }

    public function update(array $data): int
    {
        return TicketReply::query()
            ->where('id', $data['id'])
            ->update($data);
    }

    public function delete(int $id): int
    {
        return TicketReply::query()
            ->where('id', $id)
            ->delete();
    }
}
