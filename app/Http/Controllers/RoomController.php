<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class RoomController extends Controller
{
    // index
    public function index()
    {
        $data['rooms'] = DB::table('rooms')->get();
        return view('rooms.index', $data);
    }
    public function create()
    {
        return view('rooms.create');
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
            $sms = "បន្ទប់ថ្មីត្រូវបានបង្កើតដោយជោគជ័យ។";
            $sms1 = "មិនអាចបង្កើតបន្ទប់ថ្មីបានទេ សូមពិនិត្យម្តងទៀត!";
        }
        else
        {
            $sms = "The new room has been created successfully.";
            $sms1 = "Fail to create the new room, please check again!";
        }
        $i = DB::table('rooms')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/room/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/room/create')->withInput();
        }
    }
    public function edit($id)
    {
        $data['room'] = DB::table('rooms')->where('id', $id)->first();
        return view('rooms.edit', $data);
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
            $sms = "ពត៌មានបន្ទប់ត្រូវបានផ្លាស់ប្តូរដោយជោគជ័យ។";
            $sms1 = "បន្ទប់មិនអាចផ្លាស់ប្តូរបានទេ, សូមពិនិត្យម្តងទៀត!";
        }
        else
        {
            $sms = "All changes have been saved successfully.";
            $sms1 = "Fail to to save changes, please check again!";
        }
        $i = DB::table('rooms')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/room/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/room/edit/'.$r->id);
        }
    }
    public function delete($id)
    {
        DB::table('rooms')->where('id', $id)->delete();
        return redirect('/room');
    }
}
