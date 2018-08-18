<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Event extends Model
{
    use Notifiable;
    protected $fillable = ['title', 'message', 'event_start', 'event_end'];
}
