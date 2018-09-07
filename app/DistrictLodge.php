<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DistrictLodge extends Model
{
    protected $fillable = ['lodge_name','lodge_master', 'lodge_address','lodge_secretary', 'lodge_contact_number'];

    public function grand_lodge(){
    	return $this->belongsTo(GrandLodge::class,'grand_lodge_id');
    }

    public function lodges(){
    	return $this->hasMany('App\Lodge');
    }
}
