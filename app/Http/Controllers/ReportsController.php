<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class ReportsController extends Controller
{
    // index
    public function index()
    {
		$data['tbllottery'] = DB::table('tbllottery')->get();
        return view('reports.index', $data);
    }
	 public function winreports()
    {
        return view('winreports.index');
    }
    public function rereports()
    {
        return view('rereports.index');
    }
	public function find()
	{
		$l = $_GET['l'];
		$d = $_GET['d'];
		$lottery = DB::table('tbllottery')
				 ->where('lotterytype', 'like', "%{$l}%")
				 ->Where('daytype', 'like', "%{$d}%")->get();
		return $lottery;
	}
	public function finduser(){
		$user = DB::table('users')->get();
		return $user;
	}
	public function findboss()
	{
		$boss = DB::table('boss')->get();
		return $boss;
	}
	public function findseller(){
		$seller = DB::table('sellers')->get();
		return $seller;
	}
}