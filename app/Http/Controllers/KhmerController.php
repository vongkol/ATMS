<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class KhmerController extends Controller
{
    // index
    public function index()
    {
        return view('khmer.index');
    }
    public function thai()
    {
        return view('thai.index');
    }
    public function vn()
    {
        return view('vn.index');
    }
	public function savekh(Request $rs)
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
		$obj = json_encode($rs->a);
		$sb = json_decode($obj);
		$data = array();
		$k = false;
		foreach($sb as $b)
		{
			for($i=0;$i<count($b->post);$i++)
			{
				$data = array(
					'lotterytype'=> $b->lotterytype,
					'daytype'=> $b->daytype,
					'post'=> $b->post[$i],
					'cname'=> $b->cname,
					'code'=> $b->code,
					'originalcode'=> $b->originalcode,
					'amount'=> $b->amount,
					'subtotal'=> $b->subtotal,
					'seller'=> $b->seller,
					'userpost'=> Auth::user()->id
				);
				$k = DB::table('tbllottery')->insert($data);
			}		
		}
        return $k;
	}
}
