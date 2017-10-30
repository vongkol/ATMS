@extends('layouts.app')
@section('content')
    <?php $lang = Auth::user()->language=="kh"?'kh.php':'en.php'; ?>
    <?php include(app_path()."/lang/". $lang); ?>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header text-bold">
                    <i class="fa fa-user"></i> តារាងបញ្ជីកែវត្តមាន    &nbsp;&nbsp;          
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
                            <th>ថ្ងៃចូល</th>
                            <th>ថ្ងៃចេញ</th>
                            <th>ស្គេនចូល</th>
                            <th>ម៉ោងចូល</th>
                            <th>ស្គេនចេញ</th>
                            <th>ម៉ោងចេញ</th>
                            <th>អនុម័ត</th>
                            <th>{{$lb_action}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($tams_approval as $app)
                            <tr>
                                <td>{{$i}}</td>
                                <td>                         
                                    <img src="{{asset('profile/'.$app->photo)}}" width="38px" height="46px">
                                </td>
                                <td>{{$app->emp_code}}</td>
                                <td>{{$app->khm_name}}</td>
                                <td>{{$app->a_date_in}}</td>
                                <td>{{$app->a_date_out}}</td>
                                <td>{{$app->time_in}}</td>
                                <td>{{$app->a_time_in}}</td>
                                <td>{{$app->time_out}}</td>
                                <td>{{$app->a_time_out}}</td>
                                <td>{{$app->approve}}</td>
                                <td>
                                    <a href="{{url('/tams/viewapp/'.$app->id)}}" title="{{$lb_edit}}"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp
                                    <a {{$app->approve=='1'?'class=disabled':''}} href="{{url('/tams/timeapprove/'.$app->id)}}"​ onclick="return confirm('តើលោកអ្នកចង់អនុម័តសំណើរសុំកែម៉ោងឫ?')" title="អនុម័ត"><i class="fa fa-check text-success"></i></a>&nbsp;&nbsp
                                    <a {{$app->approve=='2'?'class=disabled':''}} href="{{url('/tams/timereject/'.$app->id)}}" onclick="return confirm('តើលោកអ្នកចង់បដិសេធសំណើរសុំកែម៉ោងឫ?')" title="ច្រានចោល"><i class="fa fa-remove text-danger"></i></a>&nbsp;&nbsp
                                    <a href="{{url('/tams/indapp/'.$app->id)}}" title="បោះពុម្ភ" class="btnprint"><i class="fa fa-print text-success"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="padding-left: 20px;">
                    <a href="{{url('/tams/listapp')}}" title="បោះពុម្ភ" class="btnprint"><i class="fa fa-print text-success"></i>បោះពុម្ភទាំងអស់</a>
                </div>
			</div>
		</div>
	</div>
@endsection
@section('js')
<script src="{{asset('js/jquery.printPage.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
         $('.btnprint').printPage();
    });  
</script>
@endsection