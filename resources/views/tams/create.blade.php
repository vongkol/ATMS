@extends('layouts.app')
@section('content')
    <?php $lang = Auth::user()->language=="kh"?'kh.php':'en.php'; ?>
    <?php include(app_path()."/lang/". $lang); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> គណនាម៉ោងធ្វើការ&nbsp;&nbsp;
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

                    <form action="{{url('/tams/posting')}}" class="form-horizontal" method="post">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-1 col-sm-2">នាយកដ្ឋាន</label>
                            <div class="col-lg-3 col-sm-4">
                                <select class="form-control" id="department" name="department">
                                    <option value="">ជ្រើសរើសនាយកដ្ឋាន</option>
                                    @foreach($departments as $dep)
                                        <option value="{{$dep->id}}">{{$dep->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="name" class="control-label col-lg-1 col-sm-2">ការិយាល័យ</label>
                            <div class="col-lg-3 col-sm-4">
                                <select class="form-control" id="office" name="office">
                                    <option value="">ជ្រើសរើសការិយាល័យ</option>
                                    @foreach($offices as $off)
                                        <option value="{{$off->id}}">{{$off->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-1 col-sm-2">ផ្នែក</label>
                            <div class="col-lg-3 col-sm-4">
                                <select class="form-control" id="unit" name="unit">
                                    <option value="">ជ្រើសរើសផ្នែក</option>
                                    @foreach($units as $uni)
                                        <option value="{{$uni->id}}">{{$uni->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="name" class="control-label col-lg-1 col-sm-2">មុខងារ</label>
                            <div class="col-lg-3 col-sm-4">
                                <select class="form-control" id="position" name="position">
                                    <option value="">ជ្រើសរើសមុខងារ</option>
                                    @foreach($positions as $pos)
                                        <option value="{{$pos->id}}">{{$pos->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-1 col-sm-2">អត្តលេខ</label>
                            <div class="col-lg-3 col-sm-4">
                                <select class="form-control" id="emp_code" name="emp_code">
                                    <option value="">ជ្រើសរើសអត្តលេខ</option>
                                    @foreach($employees as $emp)
                                        <option value="{{$emp->id}}">{{$emp->emp_code}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="name" class="control-label col-lg-1 col-sm-2">ឈ្មោះមន្រ្តី</label>
                            <div class="col-lg-3 col-sm-4">
                                <select class="form-control" id="emp_name" name="emp_name">
                                    <option value="">ជ្រើសរើសឈ្មោះ</option>
                                    @foreach($employees as $emp)
                                        <option value="{{$emp->id}}">{{$emp->khm_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-1 col-sm-2">ថ្ងៃទី</label>
                            <div class="col-lg-3 col-sm-4">
                                <input type="date" class="form-control" id="fromdate" name="fromdate" value="<?php echo date("Y-m-d"); ?>">
                            </div>
                            <label for="name" class="control-label col-lg-1 col-sm-2">រហូតដល់</label>
                            <div class="col-lg-3 col-sm-4">
                                <input type="date" class="form-control" id="todate" name="todate" value="<?php echo date("Y-m-d"); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-1 col-sm-2">&nbsp;</label>
                            <div class="col-lg-6 col-sm-8">
                                <button class="btn btn-primary" type="submit">គណនាម៉ោង</button>
                                <button class="btn btn-warning" type="button">របាយការណ៍</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection