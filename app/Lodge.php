<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Lodge extends Model
{
    use Notifiable;
    protected $fillable = ['lodge_name', 'lodge_address', 'lodge_contact_number', 'has_image'];

    
}
