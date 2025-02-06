<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserMeta extends Model
{
    use HasFactory;

    protected $table = 'user_metas';

    protected $fillable = [
        'user_id',
        'meta_key',
        'meta_value'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getMetaValueAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setMetaValueAttribute($value): void
    {
        $this->attributes['meta_value'] = json_encode($value);
    }
}
