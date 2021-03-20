<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;

class HospitalController extends Controller
{
    public function editdata(Request $request, $id)
  {
    $this_user_id = $id;

    $hosp = Hospital::where('user_id',$id)->first();
    if($hosp){
        $hosp->user_id = $this_user_id;
        $hosp->name = $request->name;
        $hosp->contact = $request->contact;
        $hosp->addr = $request->addr;
        $hosp->area = $request->area;
        $hosp->total_beds = $request->total_beds;
        $hosp->vacant_beds = $request->vacant_beds;
        $hosp->total_vaccines = $request->total_vaccines;
        $hosp->available_vaccines = $request->available_vaccines;
        $hosp->update();
    }else{
        $new_hosp = new Hospital;
        $new_hosp->user_id = $this_user_id;
        $new_hosp->name = $request->name;
        $new_hosp->contact = $request->contact;
        $new_hosp->addr = $request->addr;
        $new_hosp->area = $request->area;
        $new_hosp->total_beds = $request->total_beds;
        $new_hosp->vacant_beds = $request->vacant_beds;
        $new_hosp->total_vaccines = $request->total_vaccines;
        $new_hosp->available_vaccines = $request->available_vaccines;
        $new_hosp->save();
    }

    $success = 'success';
    return $success;
  }

  public function edit($id)
    {
        $hosp = Hospital::where('user_id',$id)->first();
        if($hosp){
            return $hosp;
        }else{
            $hosp = (object) [];

            return json_encode($hosp);
        }
    }

    public function add($id)
    {
        $hosp = Hospital::where('user_id',$id)->first();
        $hosp->vacant_beds = $hosp->vacant_beds + 1;
        $hosp->update();

        $success = 'success';
        return $success;
    }

    public function subtract($id)
    {
        $hosp = Hospital::where('user_id',$id)->first();
        $hosp->vacant_beds = $hosp->vacant_beds - 1;
        $hosp->update();

        $success = 'success';
        return $success;
    }

    public function subtract_vac($id)
    {
        $hosp = Hospital::where('user_id',$id)->first();
        $hosp->available_vaccines = $hosp->available_vaccines - 1;
        $hosp->update();

        $success = 'success';
        return $success;
    }

    public function list()
    {
        $hosp = Hospital::all();
        return $hosp;
    }


}
