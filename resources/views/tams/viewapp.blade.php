@extends('layouts.app')
@section('content')
    <?php $lang = Auth::user()->language=="kh"?'kh.php':'en.php'; ?>
    <?php include(app_path()."/lang/". $lang); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> កែប្រែម៉ោងធ្វើការ&nbsp;&nbsp;
                    <a href="{{url('/tams/approval')}}" class="btn btn-link btn-sm">{{$lb_back_to_list}}</a>
                </div>
                <div class="card-block">
                    @if(Session::has('sms'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms')}}
                            </div>
                        </div>
                    @endif
                    @if(Session::has('sms1'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms1')}}
                            </div>
                        </div>
                    @endif
                    <style>
                        .table .td label{
                            margin-bottom: 0;
                            padding-top: 0;
                        }
                    </style>
                    <form action="{{url('/tams/update')}}" onsubmit="return confirm('តើលោកអ្នកចង់អនុម័តសំណើរសុំកែម៉ោងឫ?')"
                          class="form-horizontal" method="post">
                        {{csrf_field()}}
                        <input type="hidden" value="{{$tams_approval->id}}" name="id">
                        <table width="100%" class="table">
                        <tr>
                        <td valign="top" class="td">
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">អត្តលេខ</label>
                            <label class="col-lg-3 col-sm-4 control-label">
                                {{$tams_approval->emp_code}}
                            </label>
                            <label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_name}}</label>
                            <label class="col-lg-3 col-sm-4 control-label">
                                {{$tams_approval->khm_name}}
                            </label>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">មុខងារ</label>
                            <label class="col-lg-3 col-sm-4 control-label">
                                {{$tams_approval->position_name}}
                            </label>
                            <label for="name" class="control-label col-lg-2 col-sm-2">ផ្នែក</label>
                            <label class="col-lg-3 col-sm-4 control-label">
                                {{$tams_approval->unit_name}}
                            </label>
                        </div> 
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">ការិយាល័យ</label>
                            <label class="col-lg-3 col-sm-4 control-label">
                                {{$tams_approval->office_name}}
                            </label>
                            <label for="name" class="control-label col-lg-2 col-sm-2">នាយកដ្ឋាន</label>
                            <label class="col-lg-3 col-sm-4 control-label">
                                {{$tams_approval->department_name}}
                            </label>
                        </div>   
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">លេខទូរសព្ទ</label>
                            <label class="col-lg-3 col-sm-4 control-label">
                                {{$tams_approval->phone}}
                            </label>
                            <label for="name" class="control-label col-lg-2 col-sm-2">អនុម័ត</label>
                            <label class="col-lg-3 col-sm-4 control-label">
                                @if($tams_approval->approve=='0')
                                    មិនទាន់អនុម័ត
                                @elseif($tams_approval->approve=='1')
                                    អនុម័ត
                                @else
                                    ច្រានចោល
                                @endif
                            </label>
                        </div>  
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">កាលបរិច្ឆេទ</label>
                            <label class="col-lg-3 col-sm-4 control-label">{{$tams_approval->modify_at}}</label>
                            </div>                                                 
                        </td>
                        <td valign="top">
                                <img style="margin-left: 0px;" src="{{asset('profile/'.$tams_approval->photo)}}" width="130px" height="160px">
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <div class="form-group row">
                                    <label for="name" class="control-label col-lg-2 col-sm-2">ថ្ងៃស្គេនចូល</label>
                                    <div class="col-lg-3 col-sm-4 control-label">
                                        <input type="text" class="form-control" readonly value="{{$tams_approval->date_in}}">
                                    </div>
                                    <label for="name" class="control-label col-lg-2 col-sm-2">ថ្ងៃស្គេនចេញ</label>
                                    <div class="col-lg-3 col-sm-4 control-label">
                                        <input type="text" class="form-control" readonly value="{{$tams_approval->date_out}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="control-label col-lg-2 col-sm-2">ម៉ោងស្គេនចូល</label>
                                    <div class="col-lg-3 col-sm-4 control-label">
                                        <input type="text" class="form-control" readonly value="{{$tams_approval->time_in}}">
                                    </div>
                                    <label for="name" class="control-label col-lg-2 col-sm-2">ម៉ោងស្គេនចេញ</label>
                                    <div class="col-lg-3 col-sm-4 control-label">
                                        <input type="text" class="form-control" readonly value="{{$tams_approval->time_out}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="control-label col-lg-2 col-sm-2">ថ្ងៃចូល</label>
                                    <div class="col-lg-3 col-sm-4 control-label">
                                        <input type="date" require id="a_date_in" name="a_date_in" class="form-control" value="{{$tams_approval->a_date_in}}">
                                    </div>
                                    <label for="name" class="control-label col-lg-2 col-sm-2">ថ្ងៃចេញ</label>
                                    <div class="col-lg-3 col-sm-4 control-label">
                                        <input type="date" require id="a_date_out" name="a_date_out" class="form-control" value="{{$tams_approval->a_date_out}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="control-label col-lg-2 col-sm-2">ម៉ោងចូល</label>
                                    <div class="col-lg-3 col-sm-4 control-label">
                                        <input type="time" require id="a_time_in" name="a_time_in" class="form-control" value="{{$tams_approval->a_time_in}}">
                                    </div>
                                    <label for="name" class="control-label col-lg-2 col-sm-2">ម៉ោងចេញ</label>
                                    <div class="col-lg-3 col-sm-4 control-label">
                                        <input type="time" require id="a_time_out" name="a_time_out" class="form-control" value="{{$tams_approval->a_time_out}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="control-label col-lg-2 col-sm-2">មូលហេតុ</label>
                                    <div class="col-lg-8 col-sm-4 control-label">
                                        <input type="text" require id="reason" name="reason" class="form-control" value="{{$tams_approval->reason}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-2 col-sm-2">
                                        <input type="checkbox" id="approve" name="approve" value="1" {{$tams_approval->approve=='1'?'checked':''}} class="form-control​" onclick="changedapp(this);"> អនុម័ត
                                    </div>
                                    <div class="col-lg-2 col-sm-2">
                                        <input type="checkbox" id="reject" name="approve" value="2" {{$tams_approval->approve=='2'?'checked':''}} class="form-control​" onclick="changedapp(this);"> ច្រានចោល
                                    </div>
                                </div>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td valign="top">
                            <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">&nbsp;</label>
                            <div class="col-lg-6 col-sm-8">
                                <button class="btn btn-primary" type="submit">{{$lb_save}}</button>
                            </div>
                            </div>
                            </td>
                            <td></td>
                        </tr>
                        </table>

                    </form>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection
@section("js")
    <script>
         function changedapp(obj){
            $('input[type="checkbox"]').not(obj).prop('checked', false);
        }
    </script>
@endsection