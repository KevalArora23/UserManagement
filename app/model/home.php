<?php

namespace App\model;
use App\User;
use Illuminate\Database\Eloquent\Model;

class home extends Model
{
    public function getUserDetails()
    {
        $user = Auth()->user();
        $idVal = $user->id;
        $allUsers = User::where('id',"!=",$idVal)->get();        
        $userData=[];
        if(!empty($user))
        {
            $userData = ["name"=>$user->firstname . " " . $user->lastname,"allUser"=>$allUsers];
        }
        return $userData;
    }

}
