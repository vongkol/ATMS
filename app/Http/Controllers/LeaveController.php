<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;

class leaveController extends Controller
{
	// leave
	public function index()
	{
        $data['departments'] = DB::table('departments')->get();
        $data['offices'] = DB::table('offices')->get();
        $data['units'] = DB::table('units')->get();
        $data['positions'] = DB::table('positions')->get();
        $data['leaves'] = DB::table('leaves')
        ->join("employees", "leaves.emp_id","=", "employees.id")
        ->join("positions", "employees.position_id","=", "positions.id")
        ->join("offices", "employees.office_id","=", "offices.id")
        ->select("leaves.*", "employees.emp_code", "employees.khm_name", "employees.photo", "positions.name as position_name","offices.name as office_name")
        ->whereDate("leaves.create_at", Input::get('date'))
        ->get();
		return view('leaves.index', $data);
    }
    public function findemp()
    {
        $q = $_GET['q'];
        $employee = DB::table('employees')
                            ->where('emp_code', '=', $q)
                            ->get();
        return $employee;                    
    }
    public function find(){
        $startdate = $_GET['start'];
        $enddate = $_GET['end'];
        $emp_code = $_GET['code'];
        $emp_name = $_GET['name'];
        $position = $_GET['pos'];
        $unit = $_GET['uni'];
        $office = $_GET['off'];
        $department = $_GET['dep'];
        $query = DB::table('leaves')
        ->join("employees", "leaves.emp_id","=", "employees.id")
        ->join("positions", "employees.position_id","=", "positions.id")
        ->join("offices", "employees.office_id","=", "offices.id")
        ->select("leaves.*", "employees.emp_code", "employees.khm_name", "employees.photo", "positions.name as position_name","offices.name as office_name")
        ->whereBetween("leaves.start_date", array($startdate, $enddate));
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
        $leaves= $query->get();
        return $leaves;
    }
	// create leave
	public function create()
	{
        $data['leavetypes'] = DB::table('leavetypes')->get();
		return view('leaves.create', $data);
	}
	public function edit($id)
	{
        $data['leavetypes'] = DB::table('leavetypes')->get();
        $data['leave']=DB::table('leaves')
        ->join("employees", "leaves.emp_id","=", "employees.id")
        ->select("leaves.*","employees.emp_code","employees.khm_name","employees.eng_name")
        ->where('leaves.id', $id)->first();
        return view('leaves.edit', $data);
	}
	public function delete($id)
	{
		DB::table('leaves')->where('id', $id)->delete();
        return redirect('/leave');
	}
	public function save(Request $r)
	{
        $day = 0.5;
        $day_type = 'H';
        $end_date = $r->start_date;
        if($r->day_type == null){
            $day_type = 'F';
            $day = 1;
            $end_date = $r->end_date;
        }
		$data = array(
            'emp_id' => $r->emp_id,
            'start_date' => $r->start_date,
            'end_date' => $end_date,
            'days' => $day,
            'leave_type' => $r->leave_type,
            'reason' => $r->reason,
            'day_type' => $day_type
        );
        $sms ="";
        $sms1="";
        if(Auth::user()->language=='kh')
        {
            $sms = "សំណើរសុំច្បាប់ថ្មីត្រូវបានបង្កើតដោយជោគជ័យ។";
            $sms1 = "មិនអាចបង្កើតសំណើរសុំច្បាប់ថ្មីបានទេ សូមពិនិត្យម្តងទៀត!";
        }
        else
        {
            $sms = "The new leave has been created successfully.";
            $sms1 = "Fail to create the new leave, please check again!";
        }
        $i = DB::table('leaves')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/leave/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/leave/create')->withInput();
        }
    }
    public function update(Request $r)
	{
        $day = 0.5;
        $day_type = 'H';
        $end_date = $r->start_date;
        if($r->day_type == null){
            $day_type = 'F';
            $day = 1;
            $end_date = $r->end_date;
        }
		$data = array(
            'emp_id' => $r->emp_id,
            'start_date' => $r->start_date,
            'end_date' => $end_date,
            'days' => $day,
            'leave_type' => $r->leave_type,
            'reason' => $r->reason,
            'day_type' => $day_type
        );
        $sms ="";
        $sms1="";
        if(Auth::user()->language=='kh')
        {
            $sms = "សំណើរសុំច្បាប់ថ្មីត្រូវបានបង្កើតដោយជោគជ័យ។";
            $sms1 = "មិនអាចបង្កើតសំណើរសុំច្បាប់ថ្មីបានទេ សូមពិនិត្យម្តងទៀត!";
        }
        else
        {
            $sms = "The new leave has been created successfully.";
            $sms1 = "Fail to create the new leave, please check again!";
        }
        $i = DB::table('leaves')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/leave/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/leave/edit/'.$r->id);
        }
	}
	public function approve(Request $r)
    {
        $data = array(
            'approve' => 1
        );
        $sms ="";
        $sms1="";
        if(Auth::user()->language=='kh')
        {
            $sms = "ពត៌មានសំណើរសុំច្បាប់ត្រូវបានអនុម័តដោយជោគជ័យ។";
            $sms1 = "ពត៌មានសំណើរសុំច្បាប់មិនអាចអនុម័តបានទេ, សូមពិនិត្យម្តងទៀត!";
        }
        else
        {
            $sms = "All approve have been saved successfully.";
            $sms1 = "Fail to to save approve, please check again!";
        }
        $i = DB::table('leaves')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/leave');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/leave');
        }
    }
    public function reject(Request $r)
    {
        $data = array(
            'approve' => 2
        );
        $sms ="";
        $sms1="";
        if(Auth::user()->language=='kh')
        {
            $sms = "ពត៌មានសំណើរច្បាប់ត្រូវបានបដិសេធដោយជោគជ័យ។";
            $sms1 = "ពត៌មានសំណើរច្បាប់មិនអាចបដិសេធបានទេ, សូមពិនិត្យម្តងទៀត!";
        }
        else
        {
            $sms = "All reject have been saved successfully.";
            $sms1 = "Fail to to save reject, please check again!";
        }
        $i = DB::table('leaves')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/leave');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/leave');
        }
    }
}