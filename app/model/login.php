<?php
namespace App\model;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class login extends Model
{
    /**
     * check credintials
     * @request - request parameters
     */

    public function checkLogin($request)
    {
        $request->validated();
        

        $emailVal = $request["email"];
        $password = $request["password"];
           
        $udata = User::where("email", $emailVal)->first();

        if (!empty($udata)) {
            if (Auth::attempt(["email" => $emailVal, "password" => $password])) {
                return redirect('/home');
            }
        } else {
            return redirect('/')->withErrors(['loginFailmsg' => 'You have entered invalid credentials. Please try again.']);
        }
    }
}
