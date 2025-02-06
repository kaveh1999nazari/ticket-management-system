<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TicketReply extends Model
{
    protected $table = 'ticket_replies';

    protected $fillable = [
        'ticket_id',
        'user_id',
        'message'
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tickets(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(TicketReply::class);
    }

    public function children(): HasMany
    {
        return $this->hasMany(TicketReply::class);
    }

}
