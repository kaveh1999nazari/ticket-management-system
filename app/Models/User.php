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
    ];

    /**
     * @var string[] $casts
     */
    protected $casts = [
        'role' => 'array'
    ];

    /**
     * @var string[] $attributes
     * set default value for role
     */
    protected $attributes = [
        'role' => '["user"]',
    ];

    public function meta()
    {
        return $this->hasMany(UserMeta::class);
    }

    public function getMeta(string $key, $default = null)
    {
        return $this->meta()
            ->where('meta_key', $key)
            ->value('meta_value') ?? $default;
    }

    public function setMeta(string $key, $value)
    {
        $this->meta()->updateOrCreate(
            ['meta_key' => $key],
            ['meta_value' => $value]
        );
    }

    public function removeMeta(string $key): void
    {
        $this->meta()->where('meta_key', $key)->delete();
    }

    public function getAllMeta()
    {
        return $this->meta()->pluck('meta_value', 'meta_key')->toArray();
    }

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
