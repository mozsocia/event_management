<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    public function rsvps()
    {
        return $this->hasMany(Rsvp::class);
    }

    public function getRsvpStatusAttribute()
    {
        $rsvp = $this->rsvps->where('user_id', auth()->user()->id)->first();
        return $rsvp ? $rsvp->status : 'not_rsvped';
    }

    protected $fillable = [
        'title', 'description', 'date', 'time', 'location', 'user_id',
    ];

}
