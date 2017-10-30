@extends('layouts.app')
@section('content')
    <?php $lang = Auth::user()->language=="kh"?'kh.php':'en.php'; ?>
    <?php include(app_path()."/lang/". $lang); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> កែប្រែវេនធ្វើការ&nbsp;&nbsp;
                    <a href="{{url('/shift')}}" class="btn btn-link btn-sm">{{$lb_back_to_list}}</a>
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

                    <form action="{{url('/shift/update')}}" onsubmit="return confirm('{{$lb_confirm_update}}')"
                          class="form-horizontal" method="post">
                        {{csrf_field()}}
                        <input type="hidden" value="{{$shift->id}}" name="id">
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-1 col-sm-2">{{$lb_name}}</label>
                            <div class="col-lg-5 col-sm-8">
                                <input type="text" required autofocus name="name" id="name" class="form-control" value="{{$shift->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-1 col-sm-2"></div>
                            <div class="col-lg-5 col-sm-8">
                                <table width="100%" border="0">
                                    <tr>
                                        <th>ម៉ោងត្រូវស្គេនចូល</th>
                                        <th>ម៉ោងចូល</th>
                                        <th>ម៉ោងត្រូវស្គេនចេញ</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="time" class="form-control" name="capture_in_start" id="capture_in_start"​ value="{{$shift->capture_in_start}}">
                                        </td>
                                        <td>
                                            <input type="time" class="form-control" name="time_in" id="time_in" value="{{$shift->time_in}}">
                                        </td>
                                        <td>
                                            <input type="time" class="form-control" name="capture_in_end" id="capture_in_end" value="{{$shift->capture_in_end}}">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg-5 col-sm-8">
                                <table width="100%" border="0">
                                    <tr>
                                        <th>ម៉ោងត្រូវស្គេនចូល</th>
                                        <th>ម៉ោងចេញ</th>
                                        <th>ម៉ោងត្រូវស្គេនចេញ</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="time" class="form-control" name="capture_out_start" id="capture_out_start" value="{{$shift->capture_out_start}}">
                                        </td>
                                        <td>
                                            <input type="time" class="form-control" name="time_out" id="time_out" value="{{$shift->time_out}}">
                                        </td>
                                        <td>
                                            <input type="time" class="form-control" name="capture_out_end" id="capture_out_end" value="{{$shift->capture_out_end}}">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-1 col-sm-2">&nbsp;</label>
                            <div class="col-lg-6 col-sm-8">
                                <button class="btn btn-primary" type="submit">{{$lb_save}}</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection