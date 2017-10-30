<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class ResultController extends Controller
{
    // index
    public function index()
    {	
        return view('result.index');
    }
	// load create result form
    public function create()
    {
        $data['results'] = DB::table('results')->get();
        return view('result.create', $data);
    }
	public function bind()
	{
		$q = $_GET['q'];
		$result = DB::table('results')->get();
		return $result;
	}
	public function save(Request $r)
    {
		$sms = ""; 
        $sms1 = "";
        $lang = Auth::user()->language;
        if($lang=='kh')
        {
            $sms = "លទ្ធផលឆ្នោត ត្រូវបានបញ្ចូលដោយជោគជ័យ។";
            $sms1 = "Lottery result has been created successfully.";
        }
        else{
            $sms = "មិនអាចបញ្ជូលលទ្ធផលឆ្នោតបានទេ, សូមត្រួតពិនិត្យម្តងទៀត!";
            $sms1 = "Fail to create lottery result. Please check your entry again!";
        }
		$data = array();
		for($i=0;$i<count($r->code);$i++)
		{
			$data[] = array(
				'lotterytype'=>$r->lotterytype,
				'daytype'=>$r->daytype,
				'post'=>$r->post[$i],
				'code'=>$r->code[$i]
			);
		}
        $i = DB::table('results')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/result/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/result/create');
        }
		
	}
}