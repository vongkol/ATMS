<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class RankController extends Controller
{
    // index
    public function index()
    {
        $data['ranks'] = DB::table('ranks')->get();
        return view('ranks.index', $data);
    }
    public function create()
    {
        return view('ranks.create');
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
            $sms = "The new rank has been created successfully.";
            $sms1 = "Fail to create the new rank, please check again!";
        }
        $i = DB::table('ranks')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/rank/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/rank/create')->withInput();
        }
    }
    public function edit($id)
    {
        $data['rank'] = DB::table('ranks')->where('id', $id)->first();
        return view('ranks.edit', $data);
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
        $i = DB::table('ranks')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/rank/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/rank/edit/'.$r->id);
        }
    }
    public function delete($id)
    {
        DB::table('ranks')->where('id', $id)->delete();
        return redirect('/rank');
    }
}
