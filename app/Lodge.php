<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Lodge extends Model
{
    use Notifiable;
    protected $fillable = ['lodge_name', 'lodge_address', 'contact_number', 'has_image'];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
