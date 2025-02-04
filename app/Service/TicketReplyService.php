<?php

namespace App\Service;

use App\Repository\TicketReplyRepository;

class TicketReplyService
{
    public function __construct(
        private readonly TicketReplyRepository $ticketReplyRepository
    )
    {
    }


}
