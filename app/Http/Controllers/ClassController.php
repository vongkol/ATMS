<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class ClassController extends Controller
{
    // index
    public function index()
    {
        $data['classes'] = DB::table('classes')->get();
        return view('classes.index', $data);
    }
    public function create()
    {
        return view('classes.create');
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
            $sms = "វគ្គសិក្សាថ្មីត្រូវបានបង្កើតដោយជោគជ័យ។";
            $sms1 = "មិនអាចបង្កើតវគ្គសិក្សាថ្មីបានទេ សូមពិនិត្យម្តងទៀត!";
        }
        else
        {
            $sms = "The new class has been created successfully.";
            $sms1 = "Fail to create the new class, please check again!";
        }
        $i = DB::table('classes')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/class/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/class/create')->withInput();
        }
    }
    public function edit($id)
    {
        $data['class'] = DB::table('classes')->where('id', $id)->first();
        return view('classes.edit', $data);
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
            $sms = "ពត៌មានវគ្គសិក្សាត្រូវបានផ្លាស់ប្តូរដោយជោគជ័យ។";
            $sms1 = "វគ្គសិក្សាមិនអាចផ្លាស់ប្តូរបានទេ, សូមពិនិត្យម្តងទៀត!";
        }
        else
        {
            $sms = "All changes have been saved successfully.";
            $sms1 = "Fail to to save changes, please check again!";
        }
        $i = DB::table('classes')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/class/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/class/edit/'.$r->id);
        }
    }
    public function delete($id)
    {
        DB::table('classes')->where('id', $id)->delete();
        return redirect('/class');
    }
}
