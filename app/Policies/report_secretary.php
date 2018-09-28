<?php

namespace App\Policies;

use App\User;
use App\FinancialReport;
use Illuminate\Auth\Access\HandlesAuthorization;

class report_secretary
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct(){
        //
    }

    public function secretary($user){
        
        $freports = FinancialReport::all();


        foreach($freports as $freports){
            $uid = $freports->user_id;

            if($freports == $user->id){
                return true;
            }
                return false;
        }
    }
}
