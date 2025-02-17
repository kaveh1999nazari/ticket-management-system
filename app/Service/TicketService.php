<?php

namespace App\Service;

use App\Exceptions\NotFoundNotificationType;
use App\Exceptions\TicketNotFoundException;
use App\Models\Ticket;
use App\Notifications\TicketCreateNotification;
use App\Repository\TicketRepository;
use Illuminate\Database\Eloquent\Collection;
use Kaveh\NotificationService\Services\NotificationService;

class TicketService
{
    public function __construct(
        private readonly TicketRepository $ticketRepository
    )
    {
    }

    /**
     * @throws NotFoundNotificationType
     * @throws \Kaveh\NotificationService\Exceptions\NotFoundNotificationType
     */
    public function create(array $data): Ticket
    {
        $ticket = $this->ticketRepository->create([
            'user_id' => Auth()->id(),
            ...$data
        ]);
        NotificationService::sendNotification(TicketCreateNotification::class, $ticket->user, 2, [
            'ticket' => $ticket,
        ]);

        return $ticket;
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
