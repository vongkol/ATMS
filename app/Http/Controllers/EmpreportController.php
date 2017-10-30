<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class EmpreportController extends Controller
{
    // index
    public function index()
    {	
        $data['departments'] = DB::table('departments')->get();
        $data['offices'] = DB::table('offices')->get();
        $data['units'] = DB::table('units')->get();
        $data['positions'] = DB::table('positions')->get();
        $data['employees'] = DB::table('employees')
        ->join("positions", "employees.position_id","=", "positions.id")
        ->join("offices", "employees.office_id","=", "offices.id")
        ->join("departments", "employees.department_id","=", "departments.id")
        ->select("employees.*", "positions.name as position_name","offices.name as office_name","departments.name as department_name")
        ->where("employees.active","=","1")
        ->paginate(10);
        return view('empreports.index', $data);
    }
    public function profile($id){
        $data['employee'] = DB::table('employees')
        ->join("positions", "employees.position_id","=", "positions.id")
        ->join("units", "employees.unit_id","=", "units.id")
        ->join("offices", "employees.office_id","=", "offices.id")
        ->join("departments", "employees.department_id","=", "departments.id")
        ->select("employees.*", "positions.name as position_name","units.name as unit_name","offices.name as office_name","departments.name as department_name")
        ->where("employees.id","=", $id)
        ->first();
        return view('empreports.profile', $data);
    }
    public function listreport(){
        $data['employees'] = DB::table('employees')
        ->join("positions", "employees.position_id","=", "positions.id")
        ->join("units", "employees.unit_id","=", "units.id")
        ->join("offices", "employees.office_id","=", "offices.id")
        ->join("departments", "employees.department_id","=", "departments.id")
        ->select("employees.*", "positions.name as position_name","units.name as unit_name","offices.name as office_name","departments.name as department_name")
        ->where("employees.active","=", 1)
        ->get();
        return view('empreports.list', $data);
    }
}