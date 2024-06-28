<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendee extends Model
{
    use HasFactory;

    //relationships
    public function user(): BelongsTo{
        return $this->belongsTo(User::class); //a user can attend many events
    }

    public function event() : BelongsTo{
        return $this->belongsTo(Event::class);
    }
}