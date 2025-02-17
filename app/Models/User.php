<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Repository\UserMetaRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kaveh\NotificationService\Abstracts\Authenticatable;
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

    public function meta(): HasMany
    {
        return $this->hasMany(UserMeta::class);
    }

    public function getMeta(string $key, $default = null)
    {
        return $this->meta()
            ->where('meta_id', $key)
            ->value('meta_value') ?? $default;
    }

    public function getAllMeta()
    {
        return $this->meta()->pluck('meta_value', 'meta_id')->toArray();
    }

    public function setMeta(string $key, $value): void
    {
        $this->meta()->updateOrCreate(
            ['meta_id' => $key],
            ['meta_value' => $value]
        );
    }

    public function removeMeta(string $key): void
    {
        $this->meta()->where('meta_id', $key)->delete();
    }

    public function routeNotificationForMail()
    {
        return app(UserMetaRepository::class)->getEmailByUserId($this->id);
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

    public function getId()
    {
        return $this->id;
    }
}
