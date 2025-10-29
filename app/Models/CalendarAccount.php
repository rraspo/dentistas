<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CalendarAccount extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'provider',
        'external_id',
        'access_token',
        'refresh_token',
        'token_expires_at',
        'scopes',
        'sync_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'token_expires_at' => 'datetime',
    ];

    /**
     * Get the user that owns the calendar account.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
