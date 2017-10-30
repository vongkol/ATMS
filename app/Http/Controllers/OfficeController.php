<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class OfficeController extends Controller
{
	// office
	public function index()
	{
		$data['offices'] = DB::table('offices')->get();
		return view('offices.index', $data);
	}
	// find offices by name or phone
    public function find()
    {
        $q = $_GET['q'];
        $offices = DB::table('offices')
                            ->where('name', 'like', "%{$q}%")                        
                            ->get();
        return $offices;                    
    }
	// create office
	public function create()
	{
		return view('offices.create');
	}
	public function edit($id)
	{
		$data['office']=DB::table('offices')->where('id', $id)->first();
        return view('offices.edit', $data);
	}
	public function delete($id)
	{
		DB::table('offices')->where('id', $id)->delete();
        return redirect('/office');
	}
	public function saveadd(Request $r)
	{
		 $data = array(
            'name' => $r->name
        );
        $sms ="";
        $sms1="";
        if(Auth::user()->language=='kh')
        {
            $sms = "ឈ្មោះការិយាល័យថ្មីត្រូវបានបង្កើតដោយជោគជ័យ។";
            $sms1 = "មិនអាចបង្កើតឈ្មោះការិយាល័យថ្មីបានទេ សូមពិនិត្យម្តងទៀត!";
        }
        else
        {
            $sms = "The new office has been created successfully.";
            $sms1 = "Fail to create the new office, please check again!";
        }
        $i = DB::table('offices')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/office/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/office/create')->withInput();
        }
	}
	  public function updateadd(Request $r)
    {
         $data = array(
            'name' => $r->name
        );
        $sms ="";
        $sms1="";
        if(Auth::user()->language=='kh')
        {
            $sms = "ពត៌មានឈ្មោះការិយាល័យត្រូវបានផ្លាស់ប្តូរដោយជោគជ័យ។";
            $sms1 = "ពត៌មានឈ្មោះការិយាល័យមិនអាចផ្លាស់ប្តូរបានទេ, សូមពិនិត្យម្តងទៀត!";
        }
        else
        {
            $sms = "All changes have been saved successfully.";
            $sms1 = "Fail to to save changes, please check again!";
        }
        $i = DB::table('offices')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/office/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/office/edit/'.$r->id);
        }
    }
}