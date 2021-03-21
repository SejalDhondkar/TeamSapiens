<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RequestData;
use App\Hospital;
use Illuminate\Support\Facades\Auth;

class RequestDataController extends Controller
{
    public function store(Request $request)
  {
    
        $new_req = new RequestData;
        $new_req->hosp_id = $request->hosp_id;
        $new_req->name = $request->name;
        $new_req->contact = $request->contact;
        $new_req->addr = $request->addr;
        $new_req->age = $request->age;
        $new_req->diabetes = $request->diabetes;
        $new_req->pulse = $request->pulse;
        $new_req->covid = $request->covid;
        $new_req->save();
    

    $success = 'success';
    return $success;
  }

  public function list()
    {
        $this_hosp_id = Hospital::where('user_id',Auth::id())->value('hosp_id');
        $data = RequestData::where('hosp_id',$this_hosp_id)->get();
        return $data;
    }
}
