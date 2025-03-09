<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventAgenda extends Model
{
    protected $fillable = [
        'event_day_id',
        'start_time',
        'end_time',
        'title',
        'description',
        'venue',
        'track',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function eventDay()
    {
        return $this->belongsTo(EventDay::class);
    }

    public function speakers()
    {
        return $this->belongsToMany(Speaker::class, 'agenda_speaker')
            ->withPivot('role')
            ->withTimestamps();
    }
}
