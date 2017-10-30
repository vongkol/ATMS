<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;

class LevreportController extends Controller
{
    // index
    public function index()
    {	
        $data['departments'] = DB::table('departments')->get();
        $data['offices'] = DB::table('offices')->get();
        $data['units'] = DB::table('units')->get();
        $data['positions'] = DB::table('positions')->get();
        $data['leaves'] = DB::table('leaves')
        ->join("employees", "employees.id","=", "leaves.emp_id")
        ->join("positions", "employees.position_id","=", "positions.id")
        ->join("offices", "employees.office_id","=", "offices.id")
        ->join("departments", "employees.department_id","=", "departments.id")
        ->select("leaves.*","employees.emp_code","employees.khm_name","employees.photo","positions.name as position_name","offices.name as office_name","departments.name as department_name")
        ->whereDate("leaves.create_at", Input::get('date'))
        ->get();
        return view('levreports.index', $data);
    }
    public function indreport($id){
        $data['leave'] = DB::table('leaves')
        ->join("employees", "employees.id","=", "leaves.emp_id")
        ->join("positions", "employees.position_id","=", "positions.id")
        ->join("units", "employees.unit_id","=", "units.id")
        ->join("offices", "employees.office_id","=", "offices.id")
        ->join("departments", "employees.department_id","=", "departments.id")
        ->join("leavetypes", "leavetypes.id","=", "leaves.leave_type")
        ->select("leaves.*","employees.emp_code","employees.khm_name","employees.photo","positions.name as position_name","units.name as unit_name","offices.name as office_name","departments.name as department_name","leavetypes.name as leave_type_name")
        ->where("leaves.id","=", $id)
        ->first();
        return view('levreports.indreport', $data);
    }
    public function listreport()
    {	
        $data['leaves'] = DB::table('leaves')
        ->join("employees", "employees.id","=", "leaves.emp_id")
        ->join("positions", "employees.position_id","=", "positions.id")
        ->join("units", "employees.unit_id","=", "units.id")
        ->join("offices", "employees.office_id","=", "offices.id")
        ->join("departments", "employees.department_id","=", "departments.id")
        ->join("leavetypes", "leavetypes.id","=", "leaves.leave_type")
        ->select("leaves.*","employees.emp_code","employees.khm_name","employees.photo","positions.name as position_name","units.name as unit_name","offices.name as office_name","departments.name as department_name","leavetypes.name as leave_type_name")
        ->get();
        return view('levreports.list', $data);
    }
}