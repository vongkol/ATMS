<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class UnitController extends Controller
{
    // index
    public function index()
    {
        $data['units'] = DB::table('units')->get();
        return view('units.index', $data);
    }
    public function create()
    {
        return view('units.create');
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
            $sms = "ឈ្មោះផ្នែកថ្មីត្រូវបានបង្កើតដោយជោគជ័យ។";
            $sms1 = "មិនអាចបង្កើតឈ្មោះផ្នែកថ្មីបានទេ សូមពិនិត្យម្តងទៀត!";
        }
        else
        {
            $sms = "The new unit has been created successfully.";
            $sms1 = "Fail to create the new unit, please check again!";
        }
        $i = DB::table('units')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/unit/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/unit/create')->withInput();
        }
    }
    public function edit($id)
    {
        $data['unit'] = DB::table('units')->where('id', $id)->first();
        return view('units.edit', $data);
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
            $sms = "ពត៌មានឈ្មោះផ្នែកត្រូវបានផ្លាស់ប្តូរដោយជោគជ័យ។";
            $sms1 = "ពត៌មានឈ្មោះផ្នែកមិនអាចផ្លាស់ប្តូរបានទេ, សូមពិនិត្យម្តងទៀត!";
        }
        else
        {
            $sms = "All changes have been saved successfully.";
            $sms1 = "Fail to to save changes, please check again!";
        }
        $i = DB::table('units')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/unit/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/unit/edit/'.$r->id);
        }
    }
    public function delete($id)
    {
        DB::table('units')->where('id', $id)->delete();
        return redirect('/unit');
    }
}
