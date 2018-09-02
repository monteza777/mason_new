<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrandLodge extends Model
{
    protected $fillable = ['lodge_name','lodge_master', 'lodge_address','lodge_secretary','lodge_contact_number'];

    public function district_lodges(){
    	return $this->hasMany('App\DistrictLodge');
    }
}
