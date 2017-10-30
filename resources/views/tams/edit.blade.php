@extends('layouts.app')
@section('content')
    <?php $lang = Auth::user()->language=="kh"?'kh.php':'en.php'; ?>
    <?php include(app_path()."/lang/". $lang); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> កែប្រែម៉ោងធ្វើការ&nbsp;&nbsp;
                    <a href="{{url('/tams')}}" class="btn btn-link btn-sm">{{$lb_back_to_list}}</a>
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
                    <form action="{{url('/tams/save')}}" onsubmit="return confirm('តើលោកអ្នកចង់កែប្រែម៉ោងឫ?')"
                          class="form-horizontal" method="post">
                        {{csrf_field()}}
                        <input type="hidden" value="{{$tams->id}}" name="id">
                        <input type="hidden" value="{{$tams->empid}}" name="emp_id">
                        <input type="hidden" value="{{$tams->tams_app_id}}" name="tams_app_id">
                        <table width="100%" class="table">
                        <tr>
                        <td valign="top" class="td">
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">អត្តលេខ</label>
                            <label class="col-lg-3 col-sm-4 control-label">
                                {{$tams->emp_code}}
                            </label>
                            <label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_name}}</label>
                            <label class="col-lg-3 col-sm-4 control-label">
                                {{$tams->khm_name}}
                            </label>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">មុខងារ</label>
                            <label class="col-lg-3 col-sm-4 control-label">
                                {{$tams->position_name}}
                            </label>
                            <label for="name" class="control-label col-lg-2 col-sm-2">ផ្នែក</label>
                            <label class="col-lg-3 col-sm-4 control-label">
                                {{$tams->unit_name}}
                            </label>
                        </div> 
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">ការិយាល័យ</label>
                            <label class="col-lg-3 col-sm-4 control-label">
                                {{$tams->office_name}}
                            </label>
                            <label for="name" class="control-label col-lg-2 col-sm-2">នាយកដ្ឋាន</label>
                            <label class="col-lg-3 col-sm-4 control-label">
                                {{$tams->department_name}}
                            </label>
                        </div> 
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">ចំនួនម៉ោងធ្វើការ</label>
                            <label class="col-lg-3 col-sm-4 control-label">
                                {{$tams->work_hour}}
                            </label>
                            <label for="name" class="control-label col-lg-2 col-sm-2">ចំនួនម៉ោងសម្រាក</label>
                            <label class="col-lg-3 col-sm-4 control-label">
                                {{$tams->early_out}}
                            </label>
                        </div>   
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">ចូលមុន</label>
                            <label class="col-lg-3 col-sm-4 control-label">
                                {{$tams->early_in}}
                            </label>
                            <label for="name" class="control-label col-lg-2 col-sm-2">ចេញមុន</label>
                            <label class="col-lg-3 col-sm-4 control-label">
                                {{$tams->early_out}}
                            </label>
                        </div>   
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">ចូលយឺត</label>
                            <label class="col-lg-3 col-sm-4 control-label">
                                {{$tams->late_in}}
                            </label>
                            <label for="name" class="control-label col-lg-2 col-sm-2">ចេញយឺត</label>
                            <label class="col-lg-3 col-sm-4 control-label">
                                {{$tams->late_out}}
                            </label>
                        </div>           
                        </td>                 
                        <td valign="top">
                                <img style="margin-left: 0px;" src="{{asset('profile/'.$tams->photo)}}" width="130px" height="160px">
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <div class="form-group row">
                                    <label for="name" class="control-label col-lg-2 col-sm-2">ថ្ងៃស្គេនចូល</label>
                                    <div class="col-lg-3 col-sm-4 control-label">
                                        <input type="text" id="date_in" name="date_in" class="form-control" readonly value="{{$tams->date_in}}">
                                    </div>
                                    <label for="name" class="control-label col-lg-2 col-sm-2">ថ្ងៃស្គេនចេញ</label>
                                    <div class="col-lg-3 col-sm-4 control-label">
                                        <input type="text" id="date_out" name="date_out" class="form-control" readonly value="{{$tams->date_out}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="control-label col-lg-2 col-sm-2">ម៉ោងស្គេនចូល</label>
                                    <div class="col-lg-3 col-sm-4 control-label">
                                        <input type="text" id="time_in" name="time_in" class="form-control" readonly value="{{$tams->time_in}}">
                                    </div>
                                    <label for="name" class="control-label col-lg-2 col-sm-2">ម៉ោងស្គេនចេញ</label>
                                    <div class="col-lg-3 col-sm-4 control-label">
                                        <input type="text" id="time_out" name="time_out" class="form-control" readonly value="{{$tams->time_out}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="control-label col-lg-2 col-sm-2">ថ្ងៃចូល</label>
                                    <div class="col-lg-3 col-sm-4 control-label">
                                        <input type="date" require id="a_date_in" name="a_date_in" class="form-control" value="{{$tams->date_in}}">
                                    </div>
                                    <label for="name" class="control-label col-lg-2 col-sm-2">ថ្ងៃចេញ</label>
                                    <div class="col-lg-3 col-sm-4 control-label">
                                        <input type="date" require id="a_date_out" name="a_date_out" class="form-control" value="{{$tams->date_out}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="control-label col-lg-2 col-sm-2">ម៉ោងចូល</label>
                                    <div class="col-lg-3 col-sm-4 control-label">
                                        <input type="time" require id="a_time_in" name="a_time_in" class="form-control" value="{{$tams->edit_time_in==''?$tams->a_time_in:$tams->edit_time_in}}">
                                    </div>
                                    <label for="name" class="control-label col-lg-2 col-sm-2">ម៉ោងចេញ</label>
                                    <div class="col-lg-3 col-sm-4 control-label">
                                        <input type="time" require id="a_time_out" name="a_time_out" class="form-control" value="{{$tams->edit_time_out==''?$tams->a_time_out:$tams->edit_time_out}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="control-label col-lg-2 col-sm-2">មូលហេតុ</label>
                                    <div class="col-lg-8 col-sm-4 control-label">
                                        <input type="text" require id="reason" name="reason" class="form-control" value="{{$tams->reason}}">
                                    </div>
                                </div>                      
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group row">
                                    <label class="control-label col-lg-1 col-sm-2">&nbsp;</label>
                                    <div class="col-lg-6 col-sm-8">
                                        <button {{$tams->approve=='1'?'disabled':''}} class="btn btn-primary" type="submit">{{$lb_save}}</button>
                                        <button class="btn btn-danger" type="reset">{{$lb_cancel}}</button>
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