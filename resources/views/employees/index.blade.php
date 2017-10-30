@extends('layouts.app')
@section('content')
    <?php $lang = Auth::user()->language=="kh"?'kh.php':'en.php'; ?>
    <?php include(app_path()."/lang/". $lang); ?>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header text-bold">
                    <i class="fa fa-user"></i> តារាងបញ្ជីមន្រ្តី&nbsp;&nbsp;
                    <a href="{{url('/employee/create')}}" class="btn btn-link btn-sm">{{$lb_new}}</a>
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
                            <th>ថ្ងៃចូលធ្វើការ</th>
                            <th>តួនាទី</th>
                            <th>ការិយាល័យ</th>
                            <th>{{$lb_action}}</th>
                        </tr>
                        </thead>
                        <tbody id="data">
                        @php($i=1)
                        @foreach($employees as $emp)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>                         
                                    <img src="{{asset('profile/'.$emp->photo)}}" width="38px" height="46px">
                                </td>
                                <td>{{$emp->emp_code}}</td>
                                <td>{{$emp->khm_name}}</td>
                                <td>{{$emp->hire_date}}</td>
                                <td>{{$emp->position_name}}</td>
                                <td>{{$emp->office_name}}</td>
                                <td>
                                    <a href="{{url('/empreport/profile/'.$emp->id)}}" title="បោះពុម្ភ" class="btnprint"><i class="fa fa-print text-success"></i></a> &nbsp;&nbsp
                                    <a href="{{url('/employee/edit/'.$emp->id)}}" title="{{$lb_edit}}"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp
                                    <a href="{{url('/employee/delete/'.$emp->id)}}" onclick="return confirm('{{$lb_confirm_delete}}')" title="{{$lb_delete}}"><i class="fa fa-remove text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$employees->links()}}
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
                    <h4 class="modal-title pull-left" id="myModalLabel">ស្វែងរកមន្រ្តី</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
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
            var emp_code = $('#empcode').val();
            var emp_name = $('#empname').val();
            var position = $('#position').val();
            var unit = $('#unit').val();
            var office = $('#office').val();
            var department = $('#department').val();
            $('#data').html("");
            $.ajax({
            type: "GET",
            url: burl + "/employee/find?dep=" + department + "&off=" + office + "&uni=" + unit + "&pos=" + position + "&name=" + emp_name + "&code=" + emp_code,
            success: function (data) {
                var tr="";
                var employees = data.data;
                for(var i=0; i<employees.length; i++)
                {
                    tr += "<tr><td>" + (i+1) + "</td>";
                    tr += '<td><img src="{{asset('profile/')}}' + '/' + employees[i].photo + '" width="38px" height="46px"></td>';
                    tr += "<td>" + employees[i].emp_code + "</td>";
                    tr += "<td>" + employees[i].khm_name + "</td>";
                    tr += "<td>" + employees[i].hire_date + "</td>";
                    tr += "<td>" + employees[i].position_name + "</td>";
                    tr += "<td>" + employees[i].office_name + "</td>";
                    tr += "<td>" +
                          '<a href="{{url('/empreport/profile/')}}' + '/' + employees[i].id + '" title="បោះពុម្ភ" class="btnprint"><i class="fa fa-print text-success"></i></a> &nbsp;&nbsp' +
                          '<a href="{{url('/employee/edit/')}}' + '/' + employees[i].id + '" title="{{$lb_edit}}"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp' +
                          '<a href="{{url('/employee/delete/')}}' + '/' + employees[i].id + '" onclick="return confirm(\'{{$lb_confirm_delete}}\')" title="{{$lb_delete}}"><i class="fa fa-remove text-danger"></i></a>' + 
                          "</td></tr>";
                }       
                $("#data").html(tr);
                $('.btnprint').printPage();
                $(".card-block .pagination").remove();
                if(data.total > data.per_page){
                    pagination(data);
                }

            }
            });
            return false;
        });
        function pagination(data){
            console.log(data);
            $('.table').after('<ul class="pagination">' + 
                '<li class="disabled page-item"><span class="page-link">«</span></li>' +
                '<li class="active page-item"><span class="page-link">1</span></li>' +
                '<li class="page-item"><a href="http://localhost:8000/employee?page=2" class="page-link">2</a></li>' +
                '<li class="page-item"><a href="http://localhost:8000/employee?page=2" rel="next" class="page-link">»</a></li>' +
                '</ul>');
        }
    </script>
@endsection