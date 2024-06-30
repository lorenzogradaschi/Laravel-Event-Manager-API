<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Attendee extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'numbersOfAttendees',
        'event_id',
        'user_id',
    ];

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class); // A user can attend many events
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    protected $casts = [
        'numbersOfAttendees' => 'int',
    ];
}
