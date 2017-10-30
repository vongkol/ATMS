<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class ShiftController extends Controller
{
    // index
    public function index()
    {
        $data['shifts'] = DB::table('shifts')->get();
        return view('shifts.index', $data);
    }
    public function create()
    {
        return view('shifts.create');
    }
    public function save(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'capture_in_start' => $r->capture_in_start,
            'time_in' => $r->time_in,
            'capture_in_end' => $r->capture_in_end,
            'capture_out_start' => $r->capture_out_start,
            'time_out' => $r->time_out,
            'capture_out_end' => $r->capture_out_end
        );
        $sms ="";
        $sms1="";
        if(Auth::user()->language=='kh')
        {
            $sms = "វេនថ្មីត្រូវបានបង្កើតដោយជោគជ័យ។";
            $sms1 = "មិនអាចបង្កើតវេនថ្មីបានទេ សូមពិនិត្យម្តងទៀត!";
        }
        else
        {
            $sms = "The new shift has been created successfully.";
            $sms1 = "Fail to create the new shift, please check again!";
        }
        $i = DB::table('shifts')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/shift/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/shift/create')->withInput();
        }
    }
    public function edit($id)
    {
        $data['shift'] = DB::table('shifts')->where('id', $id)->first();
        return view('shifts.edit', $data);
    }
    public function update(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'capture_in_start' => $r->capture_in_start,
            'time_in' => $r->time_in,
            'capture_in_end' => $r->capture_in_end,
            'capture_out_start' => $r->capture_out_start,
            'time_out' => $r->time_out,
            'capture_out_end' => $r->capture_out_end
        );
        $sms ="";
        $sms1="";
        if(Auth::user()->language=='kh')
        {
            $sms = "ពត៌មានវេនត្រូវបានផ្លាស់ប្តូរដោយជោគជ័យ។";
            $sms1 = "ពត៌មានវេនមិនអាចផ្លាស់ប្តូរបានទេ, សូមពិនិត្យម្តងទៀត!";
        }
        else
        {
            $sms = "All changes have been saved successfully.";
            $sms1 = "Fail to to save changes, please check again!";
        }
        $i = DB::table('shifts')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/shift/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/shift/edit/'.$r->id);
        }
    }
    public function delete($id)
    {
        DB::table('shifts')->where('id', $id)->delete();
        return redirect('/shift');
    }
}
