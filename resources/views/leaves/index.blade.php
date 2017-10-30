@extends('layouts.app')
@section('content')
    <?php $lang = Auth::user()->language=="kh"?'kh.php':'en.php'; ?>
    <?php include(app_path()."/lang/". $lang); ?>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header text-bold">
                    <i class="fa fa-user"></i> តារាងបុគ្គលិកសុំច្បាប់    &nbsp;&nbsp;
                    <a href="{{url('/leave/create')}}" class="btn btn-link btn-sm">{{$lb_new}}</a> 
                    <a href="#" class="btn btn-link btn-sm" data-toggle="modal" data-target="#myModal">ស្វែងរក</a>            
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
                    <table class="table table-condensed table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>{{$lb_id}}</th>
                            <th>រូបថត</th>
                            <th>អត្តលេខ</th>
                            <th>{{$lb_name}}</th>
                            <th>ថ្ងៃឈប់</th>
                            <th>រហូតដល់</th>
                            <th>ចំនួនថ្ងៃ</th>
                            <th>តួនាទី</th>
                            <th>ការិយាល័យ</th>
                            <th>អនុញ្ញាត្តិ</th>
                            <th>{{$lb_action}}</th>
                        </tr>
                        </thead>
                        <tbody id="data">
                        @php($i=1)
                        @foreach($leaves as $lea)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>                         
                                    <img src="{{asset('profile/'.$lea->photo)}}" width="38px" height="46px">
                                </td>
                                <td>{{$lea->emp_code}}</td>
                                <td>{{$lea->khm_name}}</td>
                                <td>{{$lea->start_date}}</td>
                                <td>{{$lea->end_date}}</td>
                                <td>{{$lea->days}}</td>
                                <td>{{$lea->position_name}}</td>
                                <td>{{$lea->office_name}}</td>
                                <td>
                                    @if ($lea->approve == "0")
                                        មិនទាន់ឯកភាព
                                    @elseif ($lea->approve == "1")
                                        ឯកភាព
                                    @elseif ($lea->approve == "2")
                                        មិនឯកភាព
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('/leave/edit/'.$lea->id)}}" title="{{$lb_edit}}"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp
                                    <a {{$lea->approve=='1' || $lea->approve=='2'?'class=disabled':''}} href="{{url('/leave/approve/'.$lea->id)}}"​ onclick="return confirm('តើលោកអ្នកចង់អនុម័តសំណើរសុំច្បាប់ឫ?')" title="អនុម័ត"><i class="fa fa-check text-success"></i></a>&nbsp;&nbsp
                                    <a {{$lea->approve=='2'?'class=disabled':''}} href="{{url('/leave/reject/'.$lea->id)}}" onclick="return confirm('តើលោកអ្នកចង់បដិសេធសំណើរសុំច្បាប់ឫ?')" title="ច្រានចោល"><i class="fa fa-remove text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
			</div>
		</div>
	</div>
@endsection
@section('js')
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title pull-left" id="myModalLabel">ស្វែងរកមន្រ្តីដែលឈប់ច្បាប់</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="name" class="control-label col-lg-2 col-sm-2">ចាប់ពីថ្ងៃ</label>
                        <div class="col-lg-4 col-sm-4">
                            <input type="date" id="startdate" name="startdate" class="form-control" value="<?php echo date("Y-m-d"); ?>">
                        </div>
                        <label for="name" class="control-label col-lg-2 col-sm-2">រហូតដល់ថ្ងៃ</label>
                        <div class="col-lg-4 col-sm-4">
                            <input type="date" id="enddate" name="enddate" class="form-control" value="<?php echo date("Y-m-d"); ?>">
                        </div>
                    </div>
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">នាយកដ្ឋាន</label>
                            <div class="col-lg-4 col-sm-4">
                                <select class="form-control" id="department" name="department">
                                    <option value="">ជ្រើសរើសនាយកដ្ឋាន</option>
                                    @foreach($departments as $dep)
                                        <option value="{{$dep->id}}">{{$dep->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="name" class="control-label col-lg-2 col-sm-2">ការិយាល័យ</label>
                            <div class="col-lg-4 col-sm-4">
                                <select class="form-control" id="office" name="office">
                                    <option value="">ជ្រើសរើសការិយាល័យ</option>
                                    @foreach($offices as $off)
                                        <option value="{{$off->id}}">{{$off->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>            
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">ផ្នែក</label>
                            <div class="col-lg-4 col-sm-4">
                                <select class="form-control" id="unit" name="unit">
                                    <option value="">ជ្រើសរើសផ្នែក</option>
                                    @foreach($units as $uni)
                                        <option value="{{$uni->id}}">{{$uni->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="name" class="control-label col-lg-2 col-sm-2">មុខងារ</label>
                            <div class="col-lg-4 col-sm-4">
                                <select class="form-control" id="position" name="position">
                                    <option value="">ជ្រើសរើសមុខងារ</option>
                                    @foreach($positions as $pos)
                                        <option value="{{$pos->id}}">{{$pos->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">អត្តលេខ</label>
                            <div class="col-lg-4 col-sm-4">
                                <input type="text" name="empcode" id="empcode" class="form-control">
                            </div>
                            <label for="name" class="control-label col-lg-2 col-sm-2">ឈ្មោះ</label>
                            <div class="col-lg-4 col-sm-4">
                                <input type="text" name="empname" id="empname" class="form-control">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-flat" id="btnSearch" data-dismiss="modal">ស្វែងរក</button>
                    <button type="button" class="btn btn-danger btn-flat" id="btnClose" data-dismiss="modal">ចាកចេញ</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#btnSearch').on('click', function(){
            var startdate = $('#startdate').val();
            var enddate = $('#enddate').val();
            var emp_code = $('#empcode').val();
            var emp_name = $('#empname').val();
            var position = $('#position').val();
            var unit = $('#unit').val();
            var office = $('#office').val();
            var department = $('#department').val();
            $('#data').html("");
            $.ajax({
            type: "GET",
            url: burl + "/leave/find?dep=" + department + "&off=" + office + "&uni=" + unit + "&pos=" + position + "&name=" + emp_name + "&code=" + emp_code + "&start=" + startdate + "&end=" + enddate,
            success: function (data) {
                var tr="";
                var approve = "";
                var disable1 = "";
                var disable2 = "";
                for(i=0; i<data.length; i++){
                    if(data[i].approve == 0){
                        approve = "មិនទាន់ឯកភាព";
                    } else if(data[i].approve == 1){
                        approve = "ឯកភាព";
                    } else if(data[i].approve == 2){
                        approve = "មិនឯកភាព";
                    }
                    if(data[i].approve==1 || data[i].approve==2){
                        disable1 = "class=disabled";
                    } else{
                        disable1 = "";
                    }
                    if(data[i].approve==2){
                        disable2 = "class=disabled";
                    } else {
                        disable2 = "";
                    }
                    tr += "<tr><td>" + (i+1) + "</td>";
                    tr += '<td><img src="{{asset('profile/')}}' + '/' + data[i].photo + '" width="38px" height="46px"></td>';
                    tr += "<td>" + data[i].emp_code + "</td>";
                    tr += "<td>" + data[i].khm_name + "</td>";
                    tr += "<td>" + data[i].start_date + "</td>";
                    tr += "<td>" + data[i].end_date + "</td>";
                    tr += "<td>" + data[i].days + "</td>";
                    tr += "<td>" + data[i].position_name + "</td>";
                    tr += "<td>" + data[i].office_name + "</td>";
                    tr += "<td>" + approve + "</td>";
                    tr += "<td>" +
                          '<a ' + disable1 + ' href="{{url('/leave/edit/')}}' + '/' + data[i].id + '" title="{{$lb_edit}}"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp' +
                          '<a ' + disable2 + ' href="{{url('/leave/approve/')}}' + '/' + data[i].id + '"​ onclick="return confirm(\'តើលោកអ្នកចង់អនុម័តសំណើរសុំច្បាប់ឫ?\')" title="អនុម័ត"><i class="fa fa-check text-success"></i></a>&nbsp;&nbsp' +
                          '<a href="{{url('/leave/reject/')}}' + '/' + data[i].id + '" onclick="return confirm(\'តើលោកអ្នកចង់បដិសេធសំណើរសុំច្បាប់ឫ?\')" title="ច្រានចោល"><i class="fa fa-remove text-danger"></i></a>' +
                          "</td></tr>";
                }
                $("#data").html(tr);
            }
            });
            return false;
        });
    </script>
@endsection