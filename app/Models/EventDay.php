<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventDay extends Model
{
    protected $fillable = [
        'date',
        'title',
        'subtitle',
        'day_number',
        'color_code',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function agendas()
    {
        return $this->hasMany(EventAgenda::class)->orderBy('start_time');
    }
}
