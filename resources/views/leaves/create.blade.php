@extends('layouts.app')
@section('content')
    <?php $lang = Auth::user()->language=="kh"?'kh.php':'en.php'; ?>
    <?php include(app_path()."/lang/". $lang); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> ទម្រង់សុំច្បាប់&nbsp;&nbsp;
                    <a href="{{url('/leave')}}" class="btn btn-link btn-sm">{{$lb_back_to_list}}</a>
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

                    <form action="{{url('/leave/save')}}" class="form-horizontal" method="post">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="emp_code" class="control-label col-lg-1 col-sm-2">អត្តលេខ</label>
                            <div class="col-lg-2 col-sm-2">
                                <input type="text" required autofocus name="emp_code" id="emp_code" class="form-control" value="{{old('emp_code')}}">
                                <input type="hidden" name="emp_id" id="emp_id">
                            </div>
                            <div class="col-lg-1 col-sm-2">
                                <input type="button" value="Search" class="button form-control" id="btnsearch">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="khm_name" class="control-label col-lg-1 col-sm-2">ឈ្មោះខ្មែរ</label>
                            <div class="col-lg-2 col-sm_2">
                                <input type="text" readonly name="khm_name" id="khm_name" class="form-control" value="{{old('khm_name')}}">
                            </div>
                            <label for="eng_name" class="control-label col-lg-1 col-sm-2">ឈ្មោះ</label>
                            <div class="col-lg-2 col-sm_2">
                                <input type="text" readonly name="eng_name" id="eng_name" class="form-control" value="{{old('eng_name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="leave_type" class="control-label col-lg-1 col-sm-2">ប្រភេទច្បាប់</label>
                            <div class="col-lg-5 col-sm-2">
                                <select id="leave_type" name="leave_type" class="form-control">
                                    @foreach($leavetypes as $lea)
                                                    <option value="{{$lea->id}}">{{$lea->name}}</option>
                                    @endforeach
                                </select>                              
                            </div>
                            <div class="col-lg-2 col-sm-2">
                                <input type="checkbox" id="day_type" name="day_type" value="H" checked class="form-control​" onchange="changeday();"> ច្បាប់កន្លះថ្ងៃ
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="start-date" class="control-label col-lg-1 col-sm-2">ថ្ងៃឈប់</label>
                            <div class="col-lg-2 col-sm-2">
                                <input type="date" required autofocus name="start_date" id="start_date" class="form-control" value="<?php echo date("Y-m-d"); ?>">
                            </div>
                            <label for="end_date" class="control-label col-lg-1 col-sm-2">រហូតដល់</label>
                            <div class="col-lg-2 col-sm_2">
                                <input type="date" name="end_date" disabled id="end_date" class="form-control" value="<?php echo date("Y-m-d"); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="reason" class="control-label col-lg-1 col-sm-2">មូលហេតុ</label>
                            <div class="col-lg-5 col-sm-2">
                                <input type="text" name="reason" id="reason" class="form-control" value="{{old('reason')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-1 col-sm-2">&nbsp;</label>
                            <div class="col-lg-6 col-sm-8">
                                <button class="btn btn-primary" type="submit">{{$lb_save}}</button>
                                <button class="btn btn-danger" type="reset">{{$lb_cancel}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection
@section("js")
    <script>
        $('#btnsearch').on('click', function(){
            findemp($('#emp_code').val());
        });
        // search company or enterprise by its name
        function findemp(name) {
            $.ajax({
                type: "GET",
                url: burl + "/leave/findemp?q=" + name,
                success: function (data) {
                    if(data.length >0){
                    $('#eng_name').val(data[0].eng_name);
                    $('#khm_name').val(data[0].khm_name);
                    $('#emp_id').val(data[0].id);
                    }
                }
            });
        }
        function changeday(){
            var n = $("#day_type").prop("checked");
            if(!n){
                $('#end_date').removeAttr('disabled');
            }else{
                $('#end_date').attr('disabled','disabled');
            }
        }
    </script>
@endsection