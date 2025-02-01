<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserMeta extends Model
{
    use HasFactory;

    protected $table = 'users_meta_fields';

    protected $fillable = [
        'meta_key',
        'type',
        'validation_rules'
    ];

}
