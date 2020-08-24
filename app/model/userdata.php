<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\model\city;
use App\User;
use App\model\files;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\model\techlangs;
use Illuminate\Http\Request;
use App\model\usertechdetail;
use App\Mail\useremail;
use Illuminate\Support\Facades\Mail;
use Event;
use App\Events\SendMail;

class userdata extends Model
{
    function getCityData()
    {
        return city::all();
    }

    function getTechLangsData()
    {
        return techlangs::all();
    }

    function storeData(request $request)
    {
        $request->validated();
        
        $user = Auth()->user();
        $uidVal = $user->id;
        $uploadPath = 'public/avtars';
        $path=$this->uploadFile($request,$uploadPath,$uidVal);
        $fileIdVal = $this->saveFileData($request);
        $this->saveUserTechDetailData($request,$uidVal);
        

        $userdetailArr = ["gender"=>$request["gender"],"city_id"=>$request["city"],"address"=>$request["address"]
        ,"mob_num"=>$request["mob_num"],"file_id"=>$fileIdVal];
        $userDetailId =$this->saveUserDetailData($userdetailArr);       

        
         $dataArr =["firstname"=>$request["firstname"],"lastname"=>$request["lastname"],
         "is_admin"=>$request["is_admin"],"username"=>$request["username"],"password"=>Hash::make($request["password"])
         ,"email"=>$request["email"],'usersdetail_id'=>$userDetailId];

         $users = new User;
         $idVal = $users->insertGetId($dataArr);
         
         $emailVal = $request["email"];
        // $idVal = $users->id;
         $this->sendEmail($idVal,$request["password"]);         
         return redirect("/home");

    }

    private function uploadFile(request $request,$path,$uidVal)
    {
        return $request->file('avtar')->storeAs($path, $uidVal);
    }

    private function saveFileData(request $request)
    {
        $fileObj = new files;
        $fileName = $request->file('avtar')->getClientOriginalName();
        $fileObj->name = $fileName;
        $fileObj->save();
        return $fileIdVal = $fileObj->id;
    }

    private function saveUserTechDetailData(request $request,$uidVal)
    {
        $usertechdetail = new usertechdetail;
        
        foreach ($request["techids"] as $val) {
            $usertechdetail->user_id = $uidVal;
            $usertechdetail->techlangs_id = $val;            
            $usertechdetail->save();
        }
    } 

    private function saveUserDetailData($dataArr)
    {        
        return $userDetailId = DB::table('usersdetail')->insertGetId($dataArr);
    }

    private function sendEmail($uid,$pwd)
    {
        //Mail::to($emailVal)->send(new \App\Mail\useremail());        
        Event::dispatch(new SendMail($uid,$pwd));
    }
    
}
