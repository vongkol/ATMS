@extends('layouts.app')
@section('content')
    <?php $lang = Auth::user()->language=="kh"?'kh.php':'en.php'; ?>
    <?php include(app_path()."/lang/". $lang); ?>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header text-bold">
                    <i class="fa fa-user"></i> តារាងបញ្ជីវត្តមាន &nbsp;&nbsp;
                    <a href="{{url('/tams/create')}}" class="btn btn-link btn-sm">គណនាម៉ោងធ្វើការ</a>  &nbsp;&nbsp;
                    <a href="#" class="btn btn-link btn-sm" data-toggle="modal" data-target="#myModal">ស្វែងរក</a>                       
                </div>
			    <div class="card-block">
                    <table class="table table-condensed table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>{{$lb_id}}</th>
                            <th>រូបថត</th>
                            <th>អត្តលេខ</th>
                            <th>{{$lb_name}}</th>
                            <th>ថ្ងៃចូល</th>
                            <th>ថ្ងៃចេញ</th>
                            <th>ម៉ោងចូល</th>
                            <th>ម៉ោងចេញ</th>
                            <th>ចំនួនម៉ោងធ្វើការ</th>
                            <th>ច្បាប់</th>
                            <th>{{$lb_action}}</th>
                        </tr>
                        </thead>
                        <tbody id="data">
                        @php($i=1)
                        @foreach($tams as $tam)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>                         
                                    <img src="{{asset('profile/'.$tam->photo)}}" width="38px" height="46px">
                                </td>
                                <td>{{$tam->emp_code}}</td>
                                <td>{{$tam->khm_name}}</td>
                                <td>{{$tam->a_date_in}}</td>
                                <td>{{$tam->a_date_out}}</td>
                                <td>{{$tam->a_time_in}}</td>
                                <td>{{$tam->a_time_out}}</td>
                                <td>{{$tam->work_hour}}</td>
                                <td>
                                    @if ($tam->isleave == "1")
                                        ច្បាប់
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('/tams/edit/'.$tam->id)}}" title="{{$lb_edit}}"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp
                                    <a href="{{url('/tams/indreport/'.$tam->id)}}" title="បោះពុម្ភ" class="btnprint"><i class="fa fa-print text-success"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="padding-left: 20px;">
                    <a href="{{url('/tams/list')}}" title="បោះពុម្ភ" class="btnprint"><i class="fa fa-print text-success"></i>បោះពុម្ភទាំងអស់</a>
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
                    <h4 class="modal-title pull-left" id="myModalLabel">ស្វែងរកមន្រ្តីដែលវត្តមាន និងអវត្តមាន</h4>
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
<script src="{{asset('js/jquery.printPage.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
         $('.btnprint').printPage();
    });  
</script>
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
            url: burl + "/tams/find?dep=" + department + "&off=" + office + "&uni=" + unit + "&pos=" + position + "&name=" + emp_name + "&code=" + emp_code  + "&start=" + startdate + "&end=" + enddate,
            success: function (data) {
                var tr="";
                var isleave = "";
                for(var i=0; i<data.length; i++)
                {
                    console.log(data[i].isleave);
                    if(data[i].isleave == 1){
                        isleave = "ច្បាប់";
                    } else {
                        isleave = "";
                    }
                    tr += "<tr><td>" + (i+1) + "</td>";
                    tr += '<td><img src="{{asset('profile/')}}' + '/' + data[i].photo + '" width="38px" height="46px"></td>';
                    tr += "<td>" + data[i].emp_code + "</td>";
                    tr += "<td>" + data[i].khm_name + "</td>";
                    tr += "<td>" + data[i].a_date_in + "</td>";
                    tr += "<td>" + data[i].a_date_out + "</td>";
                    tr += "<td>" + data[i].a_time_in + "</td>";
                    tr += "<td>" + data[i].a_time_out + "</td>";
                    tr += "<td>" + data[i].work_hour + "</td>";
                    tr += "<td>" + isleave + "</td>";
                    tr += "<td>" +
                          '<a href="{{url('/tams/edit/')}}' + '/' + data[i].id + '" title="{{$lb_edit}}"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp' +
                          '<a href="{{url('/tams/indreport/')}}' + '/' + data[i].id + '" title="បោះពុម្ភ" class="btnprint"><i class="fa fa-print text-success"></i></a> &nbsp;&nbsp' +
                          "</td></tr>";
                }       
                $("#data").html(tr);
                $('.btnprint').printPage();
                $(".card-block .pagination").remove();
            }
            });
            return false;
        });
    </script>
@endsection