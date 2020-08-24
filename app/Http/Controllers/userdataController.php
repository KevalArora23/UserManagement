<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\model\userdata;
use App\Http\Requests\userdatarequest;

class userdataController extends Controller
{
    protected $table = "usersdetail";    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userDataObj = new userdata();
        $cityArr = $userDataObj->getCityData();
        $user = Auth()->user();
        $userData=[];
        if(!empty($user))
        {
            $userData = ["name"=>$user->firstname . " " . $user->lastname];
        }
        $techLangsArr= $userDataObj->getTechLangsData();
        return view('userdata.create',compact('cityArr','techLangsArr','userData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(userdatarequest $request)
    {
        $userDataObj = new userdata();
        return $userDataObj->storeData($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
