<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use \stdClass;
use \DateTime;
class TestController extends Controller
{
    // index
    public function index()
    {
        return "Test";
    }
    public function calculate_time(){
        $a_time_in = '--:--';
        $a_time_out = '--:--';
        $a_date_in = '8/29/2017';
        $a_date_out = '8/29/2017';
        $capture_in_start = '06:00';
        $capture_in_end = '10:30';
        $shift_time_in = '07:00';
        $shift_time_out = '17:00';
        $capture_out_start = '12:30';
        $capture_out_end = '18:00';
        $break_time = '02:00';

        $obj_time = new stdClass();
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
            if($this->cint($obj_time->work_hour)==0){
                $obj_time->isabsent = 1;
            }
        }else{
            $obj_time->isabsent = 1;
            $obj_time->ic = 1;
        }
        return $obj_time;
    }
    public function cint($time){
        if($time != '--:--'){
            $stime = explode(':',$time);
            $result = strval($stime[0]).strval($stime[1]);
            return (int)$result;
        }
    }
}
