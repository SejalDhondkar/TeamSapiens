<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;

class DoctorController extends Controller
{
    public function list()
    {
        $doc = Doctor::all();
        return $doc;
    }
}
