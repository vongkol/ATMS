<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class CustomerController extends Controller
{
    //index
    public function index()
    {
        $data['customers'] = DB::table('customers')->orderBy('id')->get();
        return view('customers.index', $data);
    }
    public function create()
    {
        return view('customers.create');
    }
    public function save(Request $r)
    {
         $data = array(
            'name' => $r->name,
            'gender' => $r->gender,
            'phone' => $r->phone,
            'address' => $r->address
        );
        $sms ="";
        $sms1="";
        if(Auth::user()->language=='kh')
        {
            $sms = "អតិថិជនថ្មីត្រូវបានបង្កើតដោយជោគជ័យ។";
            $sms1 = "មិនអាចបង្កើតអតិថិជនថ្មីបានទេ សូមពិនិត្យម្តងទៀត!";
        }
        else
        {
            $sms = "The new customer has been created successfully.";
            $sms1 = "Fail to create the new customer, please check again!";
        }
        $i = DB::table('customers')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/customer/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/customer/create')->withInput();
        }
    }
    public function edit($id)
    {
        $data['customer'] = DB::table('customers')->where('id', $id)->first();
        return view('customers.edit', $data);
    }
    public function update(Request $r)
    {
          $data = array(
            'name' => $r->name,
            'gender' => $r->gender,
            'phone' => $r->phone,
            'address' => $r->address
        );
        $sms ="";
        $sms1="";
        if(Auth::user()->language=='kh')
        {
            $sms = "ពត៌មានអតិថិជនត្រូវបានផ្លាស់ប្តូរដោយជោគជ័យ។";
            $sms1 = "ពត៌មានអតិថិជនមិនអាចផ្លាស់ប្តូរបានទេ, សូមពិនិត្យម្តងទៀត!";
        }
        else
        {
            $sms = "All changes have been saved successfully.";
            $sms1 = "Fail to to save changes, please check again!";
        }
        $i = DB::table('customers')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/customer/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/customer/edit/'.$r->id);
        }
    }
    public function delete($id)
    {
        DB::table('customers')->where('id', $id)->delete();
        return redirect('/customer');
    }
    public function find()
    {
        $q = $_GET['q'];
        $customers = DB::table('customers')
                            ->where('name', 'like', "%{$q}%")
                            ->orWhere('phone', 'like', "%{$q}%")
                            ->get();
        return $customers;                    
    }
}
