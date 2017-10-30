<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class DepartmentController extends Controller
{
    // index
    public function index()
    {
        $data['departments'] = DB::table('departments')->get();
        return view('departments.index', $data);
    }
    // load create form
    public function create()
    {
        return view('departments.create');
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
            $sms = "ឈ្មោះនាយកដ្ឋានថ្មីត្រូវបានបង្កើតដោយជោគជ័យ។";
            $sms1 = "មិនអាចបង្កើតឈ្មោះនាយកដ្ឋានថ្មីបានទេ សូមពិនិត្យម្តងទៀត!";
        }
        else
        {
            $sms = "The new department has been created successfully.";
            $sms1 = "Fail to create the department, please check again!";
        }
        $i = DB::table('departments')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/department/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/department/create')->withInput();
        }
    }
    public function edit($id)
    {
        $data['department'] = DB::table('departments')->where('id', $id)->first();
        return view('departments.edit', $data);
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
            $sms = "ពត៌មានឈ្មោះនាយកដ្ឋានត្រូវបានផ្លាស់ប្តូរដោយជោគជ័យ។";
            $sms1 = "ឈ្មោះនាយកដ្ឋានមិនអាចផ្លាស់ប្តូរបានទេ, សូមពិនិត្យម្តងទៀត!";
        }
        else
        {
            $sms = "All changes have been saved successfully.";
            $sms1 = "Fail to to save changes, please check again!";
        }
        $i = DB::table('departments')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/department/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/department/edit/'.$r->id);
        }
    }
    public function delete($id)
    {
        DB::table('departments')->where('id', $id)->delete();
        return redirect('/department');
    }
}
