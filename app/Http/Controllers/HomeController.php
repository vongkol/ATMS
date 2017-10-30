<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["employees"] = DB::table('employees')
        ->where("active","=","1")->count();
        $data["leaves"] = DB::table('leaves')->where('approve','=',1)
        ->whereDate("create_at", Input::get('date'))->count();
        $data["tams"] = DB::table('tams')->where('isabsent','=',1)
        ->whereDate("date_in", Input::get('date'))->count();
        return view('home', $data);
    }
}
