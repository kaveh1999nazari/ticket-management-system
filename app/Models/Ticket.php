<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status'
    ];

    public function ticketReply(): HasMany
    {
        return $this->hasMany(TicketReply::class);
    }
}
