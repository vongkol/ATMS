<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class LeaveTypeController extends Controller
{
    // index
    public function index()
    {
        $data['leavetypes'] = DB::table('leavetypes')->get();
        return view('leavetypes.index', $data);
    }
    public function create()
    {
        return view('leavetypes.create');
    }
    public function save(Request $r)
    {
        $data = array(
            'name' => $r->name
        );
        $sms ="";
        $sms1="";
        if(Auth::user()->language=='kh')
        {
            $sms = "ប្រភេទច្បាប់ថ្មីត្រូវបានបង្កើតដោយជោគជ័យ។";
            $sms1 = "មិនអាចបង្កើតប្រភេទច្បាប់ថ្មីបានទេ សូមពិនិត្យម្តងទៀត!";
        }
        else
        {
            $sms = "The new leavetype has been created successfully.";
            $sms1 = "Fail to create the new leavetype, please check again!";
        }
        $i = DB::table('leavetypes')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/leavetype/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/leavetype/create')->withInput();
        }
    }
    public function edit($id)
    {
        $data['leavetype'] = DB::table('leavetypes')->where('id', $id)->first();
        return view('leavetypes.edit', $data);
    }
    public function update(Request $r)
    {
        $data = array(
            'name' => $r->name
        );
        $sms ="";
        $sms1="";
        if(Auth::user()->language=='kh')
        {
            $sms = "ពត៌មានប្រភេទច្បាប់ត្រូវបានផ្លាស់ប្តូរដោយជោគជ័យ។";
            $sms1 = "ពត៌មានប្រភេទច្បាប់មិនអាចផ្លាស់ប្តូរបានទេ, សូមពិនិត្យម្តងទៀត!";
        }
        else
        {
            $sms = "All changes have been saved successfully.";
            $sms1 = "Fail to to save changes, please check again!";
        }
        $i = DB::table('leavetypes')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/leavetype/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/leavetype/edit/'.$r->id);
        }
    }
    public function delete($id)
    {
        DB::table('leavetypes')->where('id', $id)->delete();
        return redirect('/leavetype');
    }
}
