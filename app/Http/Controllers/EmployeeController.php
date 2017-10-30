<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class EmployeeController extends Controller
{
    // index
    public function index()
    {	
        $data['departments'] = DB::table('departments')->get();
        $data['offices'] = DB::table('offices')->get();
        $data['units'] = DB::table('units')->get();
        $data['positions'] = DB::table('positions')->get();
        $data['employees'] = DB::table('employees')
        ->join("positions", "employees.position_id","=", "positions.id")
        ->join("offices", "employees.office_id","=", "offices.id")
        ->join("departments", "employees.department_id","=", "departments.id")
        ->select("employees.*", "positions.name as position_name","offices.name as office_name","departments.name as department_name")
        ->paginate(10);
        return view('employees.index', $data);
    }
    public function find(){
        $emp_code = $_GET['code'];
        $emp_name = $_GET['name'];
        $position = $_GET['pos'];
        $unit = $_GET['uni'];
        $office = $_GET['off'];
        $department = $_GET['dep'];
        $query = DB::table('employees')
        ->join("positions", "employees.position_id","=", "positions.id")
        ->join("offices", "employees.office_id","=", "offices.id")
        ->join("departments", "employees.department_id","=", "departments.id")
        ->select("employees.*", "positions.name as position_name","offices.name as office_name","departments.name as department_name")
        ->where("employees.active","=","1");
        if($department !=""){
            $query->where("employees.department_id","=","{$department}");
        }
        if($office !=""){
            $query->where("employees.office_id","=","{$office}");
        }
        if($unit !=""){
            $query->where("employees.unit_id","=","{$unit}");
        }
        if($position !=""){
            $query->where("employees.position_id","=","{$position}");
        }
        if($emp_name !=""){
            $query->where("employees.eng_name","Like","%{$emp_name}%");
        }
        if($emp_code !=""){
            $query->where("employees.emp_code","Like","%{$emp_code}%");
        }
        $employees = $query->paginate(10);
        return $employees;
    }
    public function create()
    {
        $data['positions'] = DB::table('positions')->get();
        $data['units'] = DB::table('units')->get();
        $data['offices'] = DB::table('offices')->get();
        $data['departments'] = DB::table('departments')->get();
        $data['shifts'] = DB::table('shifts')->get();
        return view('employees.create', $data);
    }
    public function edit($id)
    {
        $data['employee'] = DB::table('employees')->where('id', $id)->first();
        $data['positions'] = DB::table('positions')->get();
        $data['units'] = DB::table('units')->get();
        $data['offices'] = DB::table('offices')->get();
        $data['departments'] = DB::table('departments')->get();
        $data['shifts'] = DB::table('shifts')->get();
        return view('employees.edit', $data);
    }
    public function delete($id)
    {
        DB::table('employees')->where('id', $id)->delete();
        return redirect('/employee');
    }
    public function save(Request $r)
    {
        $file_name = "default-front.jpg";
        $sms = "";
        $sms1 = "";
        $lang = Auth::user()->language;
        if($lang=='kh')
        {
            $sms = "បុគ្គលិកថ្មី ត្រូវបានបង្កើតដោយជោគជ័យ។";
            $sms1 = "មិនអាចបង្កើតបុគ្គលិកថ្មីបានទេ, សូមត្រួតពិនិត្យម្តងទៀត!";
        }
        else{
            $sms = "New employee has been created successfully.";
            $sms1 = "Fail to create new employee. Please check your entry again!";
        }
        if($r->photo)
        {
            $file = $r->file('photo');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'profile/'; // usually in public folder
            $file->move($destinationPath, $file_name);
        }
        $data = array(
            'emp_code' => $r->emp_code,
            'khm_name' => $r->khm_name,
            'eng_name' => $r->eng_name,
            'gender' => $r->gender,
            'marital_status' => $r->marital_status,
            'nationality' => $r->nationality,
            'photo' => $file_name,
            'birth_of_date' => $r->birth_of_date,
            'qualification' => $r->qualification,
            'phone' => $r->phone,
            'address' => $r->address,
            'hire_date' => $r->hire_date,
            'position_id' => $r->position,
            'unit_id' => $r->unit,
            'office_id' => $r->office,
            'department_id' => $r->department,
            'shift_id' => $r->shift,
            'police_card_id' => $r->police_card_id,
            'national_card_id' => $r->national_card_id
        );
        $i = DB::table('employees')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/employee/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/employee/create');
        }
    }
    public function update(Request $r)
    {
        $file_name = "";
        $sms = "";
        $sms1 = "";
        $lang = Auth::user()->language;
        if($lang=='kh')
        {
            $sms = "ពត៌មានបុគ្គលិក ត្រូវបានផ្លាស់ប្តូរដោយជោគជ័យ។";           
            $sms1 = "មិនអាចធ្វើការផ្លាស់ពត៌មានបានទេ, សូមត្រួតពិនិត្យម្តងទៀត!";
        }
        else{
            $sms = "All changes have been saved successfully.";
            $sms1 = "Fail to update employee. Please check your entry again!";
        }
        $data = array();
        if($r->photo)
        {
            $file = $r->file('photo');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'profile/'; // usually in public folder
            $file->move($destinationPath, $file_name);
            $data = array(
                'emp_code' => $r->emp_code,
                'khm_name' => $r->khm_name,
                'eng_name' => $r->eng_name,
                'gender' => $r->gender,
                'marital_status' => $r->marital_status,
                'nationality' => $r->nationality,
                'photo' => $file_name,
                'birth_of_date' => $r->birth_of_date,
                'qualification' => $r->qualification,
                'phone' => $r->phone,
                'address' => $r->address,
                'hire_date' => $r->hire_date,
                'position_id' => $r->position,
                'unit_id' => $r->unit,
                'office_id' => $r->office,
                'department_id' => $r->department,
                'shift_id' => $r->shift,
                'police_card_id' => $r->police_card_id,
                'national_card_id' => $r->national_card_id
            );
        }
        else
        {
            $data = array(
                'emp_code' => $r->emp_code,
                'khm_name' => $r->khm_name,
                'eng_name' => $r->eng_name,
                'gender' => $r->gender,
                'marital_status' => $r->marital_status,
                'nationality' => $r->nationality,
                'birth_of_date' => $r->birth_of_date,
                'qualification' => $r->qualification,
                'phone' => $r->phone,
                'address' => $r->address,
                'hire_date' => $r->hire_date,
                'position_id' => $r->position,
                'unit_id' => $r->unit,
                'office_id' => $r->office,
                'department_id' => $r->department,
                'shift_id' => $r->shift,
                'police_card_id' => $r->police_card_id,
                'national_card_id' => $r->national_card_id
            );
        }
        $i = DB::table('employees')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/employee/edit/'.$r->id);
        }
        else{
            $r->session()->flash('sms1', $sms1);
            return redirect('/employee/edit/'.$r->id);
        }
    }
}