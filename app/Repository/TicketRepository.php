<?php

namespace App\Repository;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Collection;

class TicketRepository
{
    public function create(array $data): Ticket
    {
        return Ticket::query()
            ->create($data);
    }

    public function list(int $userId): Collection
    {
        return Ticket::query()
            ->where('user_id', $userId)
            ->get();
    }

    public function get(int $id): Ticket
    {
        return Ticket::query()
            ->where('id', $id)
            ->first();
    }

    public function update(array $data): int
    {
        return Ticket::query()
            ->where('id', $data['id'])
            ->update([
                'status' => $data['status']
            ]);
    }

    public function delete(int $id): int
    {
        return Ticket::query()
            ->where('id', $id)
            ->delete();
    }

}
