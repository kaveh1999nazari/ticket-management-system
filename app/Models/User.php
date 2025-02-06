<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'mobile',
        'meta'
    ];

    /**
     * @var string[] $casts
     */
    protected $casts = [
        'meta' => 'array',
        'role' => 'array'
    ];

    /**
     * @var string[] $attributes
     * set default value for role
     */
    protected $attributes = [
        'role' => '["user"]',
    ];

    // for JWT Token:
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }

    public function ticketReply(): HasMany
    {
        return $this->hasMany(TicketReply::class);
    }
}
