@extends('layouts.app')
@section('content')
    <?php $lang = Auth::user()->language=="kh"?'kh.php':'en.php'; ?>
    <?php include(app_path()."/lang/". $lang); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> បង្កើតឈ្មោះមន្រ្តីថ្មី&nbsp;&nbsp;
                    <a href="{{url('/employee')}}" class="btn btn-link btn-sm">{{$lb_back_to_list}}</a>
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

                    <form action="{{url('/employee/save')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <table border="0" width="100%">
                        <tr>
                        <td>
                            <div class="form-group row">
                                <div class="col-lg-3 col-sm-2">
                                    អត្តលេខមន្តី្រនគបាលជាតិលេខ: <input type="text" required autofocus name="emp_code" id="emp_code" class="form-control">
                                </div>
                                <div class="col-lg-4 col-sm-2">
                                    លេខអត្តសញ្ញាណប័ណ្ណនគរបាលលេខ:<input type="text" required autofocus name="police_card_id" id="police_card_id" class="form-control">
                                </div> 
                                <div class="col-lg-3 col-sm_2">
                                    លេខអត្តសញ្ញាណប័ណ្ណខ្មែរលេខ: <input type="text" required autofocus name="national_card_id" id="national_card_id" class="form-control">
                                </div>                                                
                            </div>      
                            <div class="form-group row">  
                                <div class="col-lg-3 col-sm_2">
                                    នាមត្រកូល និង នាមខ្លួន:
                                    <input type="text" required autofocus name="khm_name" id="khm_name" class="form-control">
                                </div>                     
                                <div class="col-lg-4 col-sm_2">
                                    អក្សរទ្បាតាំង:
                                    <input type="text" required autofocus name="eng_name" id="eng_name" class="form-control">
                                </div>
                                <div class="col-lg-3 col-sm_2">
                                    រូបថត
                                    <input type="file" value="" name="photo" id="photo" class="form-control" onchange="loadFile(event)">
                                </div>
                            </div> 
                        </td>
                        <td valign="top">
                            <div class="form-group row">
                                <div class"col-lg-2 col-sm-2">
                                <img src="{{asset('profile/default-front.jpg')}}" alt="" width="120px" height="160px" id="preview">
                            </div>   
                            </div>
                        </td>  
                        </tr>
                        </table>          
                        <div class="row">
		                    <div class="col-lg-12">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-expanded="true">ព័ត៌មានទូទៅ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-expanded="true">ព័ត៌មានការងារ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-other-tab" data-toggle="pill" href="#pills-other" role="tab" aria-controls="pills-other" aria-expanded="true">ព័ត៌មានផ្សេងៗ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-family-tab" data-toggle="pill" href="#pills-family" role="tab" aria-controls="pills-family" aria-expanded="true">ព័ត៌មានគ្រួសារ</a>
                                    </li>
                                </ul>
                               
                                <div class="tab-content" id="pills-tabContent" style="margin-left: -15px;">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <div class="form-group row">
                                            <div class="col-lg-4 col-sm-2">
                                                ភេទ
                                                <select class="form-control" name="gender" id="gender">
                                                    <option value="ប្រុស">ប្រុស</option>
                                                    <option value="ស្រី">ស្រី</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-sm-2">
                                                ថ្ងៃ ខែ ឆ្នាំកំណើត
                                            <input type="date" id="birth_of_date" name="birth_of_date" class="form-control">
                                            </div>
                                            <div class="col-lg-4 col-sm_2">    
                                                សញ្ជាត្តិ                               
                                                <input type="text" id="nationality" name="nationality" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-7 col-sm-2">
                                                កម្រិតវប្បធ៌មទូទៅ (បំពេញយកតែចុងក្រោយ)
                                            <input type="text" id="qualification" name="qualification" class="form-control">
                                            </div>
                                            <div class="col-lg-5 col-sm-2">
                                                លេខទូរស័ព្ទ
                                            <input type="text" id="phone" name="phone" class="form-control" placeholder="០១២៣៤៥៦៧៨៩ / ០១២​៣៤៥​៦៧៨">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12 col-sm-2">
                                                ទីកន្លែងកំណើត :
                                               <input type="text" id="place_of_bod" name="place_of_bod" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12 col-sm-2">
                                                អាសយដ្ឋានបច្ចុប្បន្ន :
                                            <input type="text" id="address" name="address" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <div class="form-group row">
                                            <label for="hire_date" class="control-label col-lg-1 col-sm-2">ថ្ងៃធ្វើការ</label>
                                            <div class="col-lg-2 col-sm-2">
                                               <input type="date" id="hire_date" name="hire_date" class="form-control" value="<?php echo date("Y-m-d"); ?>">
                                            </div>
                                            <label for="position" class="control-label col-lg-1 col-sm-2">មុខដំណែង</label>
                                            <div class="col-lg-3 col-sm_2">
                                                <select class="form-control" id="position" name="position">
                                                    <option value="">ជ្រើសរើសមុខដំណែង</option>
                                                    @foreach($positions as $pos)
                                                        <option value="{{$pos->id}}">{{$pos->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label for="unit" class="control-label col-lg-2 col-sm-2">ផ្នែក</label>
                                            <div class="col-lg-3 col-sm_2">
                                                <select class="form-control" id="unit" name="unit">
                                                    <option value="">ជ្រើសរើសផ្នែក</option>
                                                    @foreach($units as $uni)
                                                        <option value="{{$uni->id}}">{{$uni->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="hire_date" class="control-label col-lg-1 col-sm-2"></label>
                                            <div class="col-lg-2 col-sm-2">
                                               
                                            </div>
                                            <label for="office" class="control-label col-lg-1 col-sm-2">ការិយាល័យ</label>
                                            <div class="col-lg-3 col-sm_2">
                                                <select class="form-control" id="office" name="office">
                                                    <option value="">ជ្រើសរើសការិយាល័យ</option>
                                                    @foreach($offices as $off)
                                                        <option value="{{$off->id}}">{{$off->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label for="department" class="control-label col-lg-2 col-sm-2">នាយកដ្ឋាន</label>
                                            <div class="col-lg-3 col-sm_2">
                                                <select class="form-control" id="department" name="department">
                                                    <option value="">ជ្រើសរើសនាយកដ្ឋាន</option>
                                                    @foreach($departments as $dep)
                                                        <option value="{{$dep->id}}">{{$dep->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="pills-family" role="tabpanel" aria-labelledby="pills-family-tab">
                                        <div class="col-lg-3 col-sm_2">
                                            ស្ថានភាពគ្រួសារ
                                            <select class="form-control" id="marital_status" name="marital_status">
                                                <option value="នៅលីវ">នៅលីវ</option>
                                                <option value="រៀបការ">រៀបការ</option>
                                                <option value="ពោះម៉ាយ">ពោះម៉ាយ</option>
                                                <option value="មេម៉ាយ">មេម៉ាយ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-other" role="tabpanel" aria-labelledby="pills-other-tab">
                                        <div class="form-group row">
                                            <label for="shift" class="control-label col-lg-1 col-sm-2">វេនធ្វើការ</label>
                                            <div class="col-lg-3 col-sm_2">
                                                <select class="form-control" id="shift" name="shift">
                                                @foreach($shifts as $shi)
                                                    <option value="{{$shi->id}}">{{$shi->name}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
@section('js')
<script type="text/javascript">
$('#pills-tab a').click(function() {
      $("a.active").removeClass("active");
      $(this).addClass('active');
      $('#pills-tabContent div').addClass('show');
});
</script>
<script>
        function loadFile(e){
            var output = document.getElementById('preview');
            output.src = URL.createObjectURL(e.target.files[0]);
        }
</script>
@endsection