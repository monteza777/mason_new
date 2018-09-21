<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Lodge extends Model
{
    use Notifiable;
    protected $fillable = ['lodge_name', 'lodge_address', 'lodge_contact_number','lodge_master','lodge_secretary','has_image'];

    public function district_lodges(){
    	return $this->belongsTo(DistrictLodge::class,'district_lodge_id');
    }

    public function users(){
    	return $this->belongsToMany(User::class,'lodge_users','lodge_id','user_id');
    }
}