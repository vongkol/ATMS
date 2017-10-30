<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use \stdClass;
use \DateTime;
class TamsController extends Controller
{
    // index
    public function index()
    {
        $data['departments'] = DB::table('departments')->get();
        $data['offices'] = DB::table('offices')->get();
        $data['units'] = DB::table('units')->get();
        $data['positions'] = DB::table('positions')->get();
        $data['tams'] = DB::table('tams')
        ->join("employees", "tams.emp_id","=", "employees.id")
        ->leftjoin("positions", "employees.position_id","=", "positions.id")
        ->leftjoin("offices", "employees.office_id","=", "offices.id")
        ->select("tams.*", "employees.emp_code", "employees.khm_name", "employees.photo", "positions.name as position_name","offices.name as office_name")
        ->whereDate("tams.date_in", Input::get('date'))
        ->get();
        return view('tams.index', $data);
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
        $query = DB::table('tams')
        ->join("employees", "tams.emp_id","=", "employees.id")
        ->leftjoin("positions", "employees.position_id","=", "positions.id")
        ->leftjoin("offices", "employees.office_id","=", "offices.id")
        ->select("tams.*", "employees.emp_code", "employees.khm_name", "employees.photo", "positions.name as position_name","offices.name as office_name")
        ->whereBetween("tams.date_in", array($startdate, $enddate));
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
        $tams = $query->get();
        return $tams;
    }
    public function create()
    {
        $data['departments'] = DB::table('departments')->get();
        $data['offices'] = DB::table('offices')->get();
        $data['units'] = DB::table('units')->get();
        $data['positions'] = DB::table('positions')->get();
        $data['employees'] = DB::table('employees')->get();
        return view('tams.create', $data);
    }
    public function save(Request $r)
    {
        $data = array(
            'tams_id'  => $r->id,
            'emp_id' => $r->emp_id,
            'a_date_in' => $r->a_date_in,
            'a_date_out' => $r->a_date_out,
            'a_time_in' => $r->a_time_in,
            'a_time_out' => $r->a_time_out,
            'date_in' => $r->date_in,
            'date_out' => $r->date_out,
            'time_in' => $r->time_in,
            'time_out' => $r->time_out,
            'reason' => $r->reason,
            'user_approve' => Auth::user()->id
        );
        $sms ="";
        $sms1="";
        if(Auth::user()->language=='kh')
        {
            $sms = "កែម៉ោងថ្មីត្រូវបានបង្កើតដោយជោគជ័យ។";
            $sms1 = "មិនអាចបង្កើតកែម៉ោងថ្មីបានទេ សូមពិនិត្យម្តងទៀត!";
        }
        else
        {
            $sms = "The new edit tams has been created successfully.";
            $sms1 = "Fail to create the new edit tams, please check again!";
        }
        $i = 0;
        if($r->tams_app_id == ''){
            $i = DB::table('tams_approval')->insert($data);
        }else{
            $i = DB::table('tams_approval')->where('id', $r->tams_app_id)->update($data);
        }
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/tams/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/tams/edit/'.$r->id);
        }
    }
    public function edit($id)
    {
        $data['tams'] = DB::table('tams')
        ->join('employees','tams.emp_id','=','employees.id')
        ->leftjoin("positions","employees.position_id","=","positions.id")
        ->leftjoin("units","employees.unit_id","=","units.id")
        ->leftjoin("offices","employees.office_id","=","offices.id")
        ->leftjoin("departments","employees.department_id","=","departments.id")
        ->leftjoin("tams_approval","tams.id","=","tams_approval.tams_id")
        ->select("tams.*","tams_approval.id as tams_app_id","tams_approval.approve","tams_approval.reason","tams_approval.a_time_in as edit_time_in","tams_approval.a_time_out as edit_time_out","employees.id as empid","employees.emp_code","employees.khm_name","employees.photo","employees.phone","positions.name as position_name","units.name as unit_name","offices.name as office_name","departments.name as department_name")
        ->where('tams.id', $id)->first();
        return view('tams.edit', $data);
    }
    public function update(Request $r)
    {
        $approve = $r->approve;
        if($approve == 2){
            $approve = 2;
        }
        $data = array(
            'a_date_in' => $r->a_date_in,
            'a_date_out' => $r->a_date_out,
            'a_time_in' => $r->a_time_in,
            'a_time_out' => $r->a_time_out,
            'reason' => $r->reason,
            'approve' => $approve,
            'user_approve' => Auth::user()->id,
            'modify_at' => date('Y-m-d h:i:s')
        );
        $sms ="";
        $sms1="";
        if(Auth::user()->language=='kh')
        {
            $sms = "ពត៌មានសំណើរសុំកែម៉ោងត្រូវបានអនុម័តដោយជោគជ័យ។";
            $sms1 = "ពត៌មានសំណើរសុំកែម៉ោងមិនអាចអនុម័តបានទេ, សូមពិនិត្យម្តងទៀត!";
        }
        else
        {
            $sms = "All changes have been approved successfully.";
            $sms1 = "Fail to to approved changes, please check again!";
        }
        $i = DB::table('tams_approval')->where('id', $r->id)->update($data);
        if ($i)
        {
            $this->update_tams($r->id);
            $r->session()->flash('sms', $sms);
            return redirect('/tams/viewapp/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/tams/viewapp/'.$r->id);
        }
    }
    public function delete($id)
    {
        DB::table('tams')->where('id', $id)->delete();
        return redirect('/tams');
    }
    public function indreport($id){
        $data['tams'] = DB::table('tams')
        ->join("employees", "tams.emp_id","=", "employees.id")
        ->leftjoin("positions", "employees.position_id","=", "positions.id")
        ->leftjoin("units", "employees.unit_id","=", "units.id")
        ->leftjoin("offices", "employees.office_id","=", "offices.id")
        ->leftjoin("departments", "employees.department_id","=", "departments.id")
        ->select("tams.*", "employees.emp_code", "employees.khm_name", "employees.photo", "positions.name as position_name","units.name as unit_name","offices.name as office_name","departments.name as department_name")
        ->where("tams.id","=", $id)
        ->first();
        return view('tams.indreport', $data);
    }
    public function listtams(){
        $data['tams'] = DB::table('tams')
        ->join("employees", "tams.emp_id","=", "employees.id")
        ->leftjoin("positions", "employees.position_id","=", "positions.id")
        ->leftjoin("units", "employees.unit_id","=", "units.id")
        ->leftjoin("offices", "employees.office_id","=", "offices.id")
        ->leftjoin("departments", "employees.department_id","=", "departments.id")
        ->select("tams.*", "employees.emp_code", "employees.khm_name", "employees.photo", "positions.name as position_name","units.name as unit_name","offices.name as office_name","departments.name as department_name")
        ->get();
        return view('tams.list', $data);
    }
    public function approval(){
        $data['tams_approval'] = DB::table('tams_approval')
        ->join('employees','tams_approval.emp_id','=','employees.id')
        ->select("tams_approval.*","employees.emp_code","employees.khm_name","employees.photo")
        ->get();
        return view('tams.approval', $data);
    }
    public function viewapp($id){
        $data['tams_approval'] = DB::table('tams_approval')
        ->join('employees','tams_approval.emp_id','=','employees.id')
        ->leftjoin("positions","employees.position_id","=","positions.id")
        ->leftjoin("units","employees.unit_id","=","units.id")
        ->leftjoin("offices","employees.office_id","=","offices.id")
        ->leftjoin("departments","employees.department_id","=","departments.id")
        ->select("tams_approval.*","employees.emp_code","employees.khm_name","employees.photo","employees.phone","positions.name as position_name","units.name as unit_name","offices.name as office_name","departments.name as department_name")
        ->where("tams_approval.id","=",$id)
        ->first();
        return view('tams.viewapp', $data);
    }
    public function listapp(){
        $data['tams_approval'] = DB::table('tams_approval')
        ->join('employees','tams_approval.emp_id','=','employees.id')
        ->select("tams_approval.*","employees.emp_code","employees.khm_name","employees.photo")
        ->get();
        return view('tams.listapp', $data);
    }
    public function indapp($id){
        $data['tams_approval'] = DB::table('tams_approval')
        ->join('employees','tams_approval.emp_id','=','employees.id')
        ->leftjoin("positions","employees.position_id","=","positions.id")
        ->leftjoin("units","employees.unit_id","=","units.id")
        ->leftjoin("offices","employees.office_id","=","offices.id")
        ->leftjoin("departments","employees.department_id","=","departments.id")
        ->leftjoin("users","tams_approval.user_approve","=","users.id")
        ->select("tams_approval.*","employees.emp_code","employees.khm_name","employees.photo","positions.name as position_name","units.name as unit_name","offices.name as office_name","departments.name as department_name","users.name as user_name")
        ->where("tams_approval.id","=", $id)
        ->first();
        return view('tams.indapp', $data);
    }
    public function timeapprove(Request $r){
        $data = array(
            'approve' => 1,
            'user_approve' => Auth::user()->id
        );
        $sms ="";
        $sms1="";
        if(Auth::user()->language=='kh')
        {
            $sms = "ពត៌មានសំណើរសុំកែម៉ោងត្រូវបានអនុម័តដោយជោគជ័យ។";
            $sms1 = "ពត៌មានសំណើរសុំកែម៉ោងមិនអាចអនុម័តបានទេ, សូមពិនិត្យម្តងទៀត!";
        }
        else
        {
            $sms = "All edit time have been saved successfully.";
            $sms1 = "Fail to to save approve, please check again!";
        }
        $i = DB::table('tams_approval')->where('id', $r->id)->update($data);
        if ($i)
        {
            $this->update_tams($r->id);
            $r->session()->flash('sms', $sms);
            return redirect('/tams/approval');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/tams/approval');
        }
    }
    public function timereject(Request $r){
        $data = array(
            'approve' => 2,
            'user_approve' => Auth::user()->id
        );
        $sms ="";
        $sms1="";
        if(Auth::user()->language=='kh')
        {
            $sms = "ពត៌មានសំណើរសុំកែម៉ោងត្រូវបានច្រានចោលដោយជោគជ័យ។";
            $sms1 = "ពត៌មានសំណើរសុំកែម៉ោងមិនអាចច្រានចោលបានទេ, សូមពិនិត្យម្តងទៀត!";
        }
        else
        {
            $sms = "All reject have been saved successfully.";
            $sms1 = "Fail to to save reject, please check again!";
        }
        $i = DB::table('tams_approval')->where('id', $r->id)->update($data);
        if ($i)
        {
            $this->update_tams($r->id);
            $r->session()->flash('sms', $sms);
            return redirect('/tams/approval');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/tams/approval');
        }
    }
    public function update_tams($id){
        $tams_aproval = DB::table('tams_approval')
        ->leftjoin('employees','employees.id','=','tams_approval.emp_id')
        ->select('tams_approval.*','employees.shift_id')
        ->where('tams_approval.id','=', $id)
        ->where('tams_approval.approve','=', 1)
        ->first();
        $shift  = DB::table('shifts')
        ->where('id','=',$tams_aproval->shift_id)
        ->first();
        $obj_time = $this->calculate_time($shift, $tams_aproval);
        $data = array(
            'a_date_in' => $tams_aproval->a_date_in,
            'a_date_out' => $tams_aproval->a_date_out,
            'a_time_in' => $tams_aproval->a_time_in,
            'a_time_out' => $tams_aproval->a_time_out,
            'isabsent' => $obj_time->isabsent,
            'ic' => $obj_time->ic,
            'early_in' => $obj_time->early_in,
            'early_out' => $obj_time->early_out,
            'late_in' => $obj_time->late_in,
            'late_out' => $obj_time->late_out,
            'work_hour' => $obj_time->work_hour
        );
        DB::table('tams')->where('id', $tams_aproval->tams_id)->update($data);
    }
    public function calculate_time($shift, $tams_aproval){
        if($tams_aproval != NULL){
        $a_time_in = $tams_aproval->a_time_in;
        $a_time_out = $tams_aproval->a_time_out;
        $a_date_in = $tams_aproval->a_date_in;
        $a_date_out = $tams_aproval->a_date_out;
        $capture_in_start = $shift->capture_in_start;
        $capture_in_end = $shift->capture_in_end;
        $shift_time_in = $shift->time_in;
        $shift_time_out = $shift->time_out;
        $capture_out_start = $shift->capture_out_start;
        $capture_out_end = $shift->capture_out_end;
        $capture_out_start = $shift->capture_out_start;
        $break_time = '00:00';
        $isleave = $tams_aproval->isleave;
        if($this->cint($a_time_out)>=$this->cint($capture_out_start)){
            $break_time = $shift->break_time;
        }
        $obj_time = new stdClass();
        $obj_time->time_in = $a_time_in;
        $obj_time->time_out = $a_time_out;
        $obj_time->early_in = '00:00';
        $obj_time->early_out = '00:00';
        $obj_time->late_in = '00:00';
        $obj_time->late_out = '00:00';
        $obj_time->work_hour = '00:00';
        $obj_time->isabsent = 0;
        $obj_time->ic = 0;
        if($a_time_in <>'--:--' && $a_time_out <>'--:--'){
        if($a_date_out == $a_date_in){
            if($this->cint($a_time_in)<$this->cint($shift_time_in)){
                $time1 = new DateTime($a_time_in);
                $time2 = new DateTime($shift_time_in);
                $early_in = $time1->diff($time2);
                $obj_time->early_in = $early_in->format('%H:%I');
            }
            if($this->cint($a_time_out)<$this->cint($shift_time_out)){
                $time1 = new DateTime($a_time_out);
                $time2 = new DateTime($shift_time_out);
                $early_out = $time1->diff($time2);
                $obj_time->early_out = $early_out->format('%H:%I');
            }
            if($this->cint($a_time_in)>$this->cint($shift_time_in)){
                $time1 = new DateTime($a_time_in);
                $time2 = new DateTime($shift_time_in);
                $late_in = $time1->diff($time2);
                $obj_time->late_in = $late_in->format('%H:%I');
            }
            if($this->cint($a_time_out)>$this->cint($shift_time_out)){
                $time1 = new DateTime($a_time_out);
                $time2 = new DateTime($shift_time_out);
                $late_out = $time1->diff($time2);
                $obj_time->late_out = $late_out->format('%H:%I');
            }
            $time1 = new DateTime($a_time_in);
            $time2 = new DateTime($a_time_out);
            $time3 = new DateTime($break_time);
            $time4 = new DateTime($obj_time->late_out);
            $time5 = new DateTime($obj_time->early_in);
            $work_hour = $time1->diff($time2);
            $work_hour = $work_hour->format('%H:%I');
            if($this->cint($work_hour) > 0){
                $work_hour = new DateTime($work_hour);
                $work_hour = $work_hour->diff($time3);
                $work_hour = $work_hour->format('%H:%I');
                $work_hour = new DateTime($work_hour);
                $work_hour = $work_hour->diff($time4);
                $work_hour = $work_hour->format('%H:%I');
                $work_hour = new DateTime($work_hour);
                $work_hour = $work_hour->diff($time5);
                $obj_time->work_hour = $work_hour->format('%H:%I');
            }
        }
        elseif($a_date_out > $a_date_in){

        }
    }else{
        if($isleave == 0) {
            $obj_time->isabsent = 1;
        }
        $obj_time->ic = 1;
    }
        return $obj_time;
    }
    }
    public function cint($time){
        $stime = explode(':',$time);
        $result = strval($stime[0]).strval($stime[1]);
        return (int)$result;
    }
    public function posting(Request $r){  
        $sms ="";
        $sms1="";
        if($r->fromdate != $r->todate){
            if(Auth::user()->language=='kh')
            {
                $sms1 = "កាលបិរច្ឆេទមិនអានខុសគ្នានោះទេ!";
                $r->session()->flash('sms1', $sms1);
                return redirect('/tams/create');
            }
            else
            {
                $sms1 = "From date and To date must be the same!";
                $r->session()->flash('sms1', $sms1);
                return redirect('/tams/create');
            }
        }else{
        $filter = DB::table('employees');
        if($r->department <> ""){
            $filter->where("department_id","=",$r->department);
        }
        if($r->office <> ""){
            $filter->where("office_id","=",$r->office);
        }
        if($r->unit <> ""){
            $filter->where("unit_id","=",$r->unit);
        }
        if($r->position <> ""){
            $filter->where("position_id","=",$r->position);
        }
        if($r->emp_code <> ""){
            $filter->where("id","=",$r->emp_code);
        }    
        if($r->emp_name <> ""){
            $filter->where("id","=",$r->emp_name);
        }      
        $employees = $filter->get();
        $obj_results = array();
        $obj_result = new stdClass();     
        foreach($employees as $emp){
            $shift = DB::table('shifts')
            ->where("id","=", $emp->shift_id)
            ->first();
            $accesslogs = DB::table('accesslogs')
            ->where("fingerprint","=", $emp->emp_code)
            ->whereBetween("date", array($r->fromdate, $r->todate))
            ->orderBy('id', 'asc')
            ->get();
            if($shift!=NULL){
            $obj_log = $this->dailyposting($accesslogs, $shift, $emp->id, $r->fromdate);
            $obj_result = $this->calculate_time($shift, $obj_log);
            if($obj_result !=NULL){
            $obj_result->emp_id = $emp->id;
            $obj_result->date_in = $r->fromdate;
            $obj_result->date_out = $r->fromdate;
            $obj_result->a_date_in = $r->fromdate;
            $obj_result->a_date_out = $r->fromdate;
            $obj_result->isleave = $obj_log->isleave;
            $obj_result->leave_status = $obj_log->leave_status;
            $obj_result->a_time_in = $obj_log->a_time_in;
            $obj_result->a_time_out = $obj_log->a_time_out;
            $obj_results[] = (array)$obj_result;
            }
        }
        }
        if(Auth::user()->language=='kh')
        {
            $sms = "ការគណនាម៉ោងដោយជោគជ័យ។";
            $sms1 = "មិនអាចគណនាម៉ោងបានទេ សូមពិនិត្យម្តងទៀត!";
        }
        else
        {
            $sms = "Posting tams has been created successfully.";
            $sms1 = "Fail to posting tams, please check again!";
        }
        $i = 0;
        if(count($obj_results)>0){
            DB::table('tams')->where('date_in', $r->fromdate)->delete();
            $i = DB::table('tams')->insert($obj_results);
        }
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/tams/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/tams/create');
        }
    }
    }
    public function dailyposting($accesslogs, $shift, $emp_id, $startdate)
    {
        $obj_log = new stdClass();
        $obj_log->emp_id = $emp_id;
        $obj_log->fingerprint = '';
        $obj_log->a_date_in = $startdate;
        $obj_log->a_date_out = $startdate;
        $obj_log->a_time_in = '--:--';
        $obj_log->a_time_out = '--:--';
        $obj_log->isleave = 0;
        $obj_log->leave_status= '';
        if(count($accesslogs)>0)
        {
            $capture_in_end = $shift->capture_in_end;
            $capture_out_end = $shift->capture_out_end;
            $first_time = $accesslogs{0}->time;
            $last_time =  $accesslogs->last()->time;
            if($this->cint($first_time) <= $this->cint($capture_in_end)){
                $obj_log->a_time_in = $first_time;
            }
            if($this->cint($last_time) > $this->cint($capture_in_end) && $this->cint($last_time) <= $this->cint($capture_out_end)){
                $obj_log->a_time_out = $last_time;
            }
            $obj_leave = DB::table('leaves')
            ->where("emp_id","=", $emp_id)
            ->where("start_date",">=", $startdate)
            ->where("end_date","<=", $startdate)
            ->where("approve","=",1)
            ->first();
            if($obj_leave !=NULL){
                $obj_log->isleave = 1;
                $obj_log->leave_status = $obj_leave->leave_type;
            }     
        }else{
            $obj_log->a_time_in = '--:--';
            $obj_log->a_time_out = '--:--';
            $obj_leave = DB::table('leaves')
            ->where("emp_id","=", $emp_id)
            ->where("start_date",">=", $startdate)
            ->where("end_date","<=", $startdate)
            ->where("approve","=",1)
            ->first();
            if($obj_leave !=NULL){
                $obj_log->isleave = 1;
                $obj_log->leave_status = $obj_leave->leave_type;
            }    
        }
        return $obj_log;
    }
}
