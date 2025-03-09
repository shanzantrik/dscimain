<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'company',
        'bio',
        'image',
        'order'
    ];

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }

    public function agendas()
    {
        return $this->belongsToMany(EventAgenda::class, 'agenda_speaker')
            ->withPivot('role')
            ->withTimestamps();
    }
}
