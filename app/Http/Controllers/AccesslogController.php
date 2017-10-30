<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class AccesslogController extends Controller
{
    // index
    public function index()
    {
        $data['accesslogs'] = DB::table('accesslogs')
        ->join("employees", "accesslogs.fingerprint","=", "employees.emp_code")
        ->select('accesslogs.*','employees.khm_name as emp_name')
        ->orderby('accesslogs.fingerprint','desc')
        ->orderby('date','desc')
        ->get();
        return view('accesslogs.index', $data);
    }
    public function download(Request $r){
        $data = array(
            'fingerprint' => $r->fingerprint,
            'date' => $r->date,
            'time' => $r->time,
            'key' => $r->key
        );
        $i = DB::table('accesslogs')->insert($data);     
    }
}
