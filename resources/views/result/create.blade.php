@extends('layouts.app')
@section('content')
    <?php $lang = Auth::user()->language=="kh"?'kh.php':'en.php'; ?>
    <?php include(app_path()."/lang/". $lang); ?>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header text-bold">
					<i class="fa fa-align-justify"></i> {{$lb_new_result}}&nbsp;&nbsp; &nbsp;
                    <a href="{{url('/result')}}" class="btn btn-link btn-sm">{{$lb_back_to_list}}</a>
                </div>
			</div>
		</div>	
	</div>	
	<div class="row">
		<div class="col-lg-2">
			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
				<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-expanded="true">{{$lb_khmer_lottery}}</a>
				<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-expanded="true">{{$lb_thai_lottery}}</a>
				<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-expanded="true">{{$lb_vietnamese_lottery}}</a>
				<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-expanded="true">{{$lb_postLO}}</a>
			</div>
		</div>
		<div class="col-lg-10">
			<div class="tab-content" id="v-pills-tabContent">
				<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
					<label> <i class="fa fa-align-justify"></i> <strong> {{$lb_khmer_lottery}}</strong></label>
					<label></label>
					 <label><input type="radio" name="shift" checked value="T1"> &nbsp;តង់ទី ១</label>
                        <label><input type="radio" name="shift" value="T2"> &nbsp;តង់ទី ២</label>
                        <label><input type="radio" name="shift" value="T3"> &nbsp;តង់ទី ៣</label>
                        <label><input type="radio" name="shift" value="T4"> &nbsp;តង់ទី ៤</label>
						<label><input type="radio" name="shift" value="T5"> &nbsp;តង់ទី ៥</label>
						<div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postA2}}</label>
                            <div class="col-lg-1 col-sm-1">
								<input type="text" value="A" class="form-control" readonly name="kpost[]">                             
                            </div>
							<div class="col-lg-3 col-sm-3">
								<input type="text" required name="kcode[]" id="kpostA2" class="form-control" autofocus>
							</div>
							<label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postA3}}</label>
							<div class="col-lg-1 col-sm-1">
								<input type="text" value="A" class="form-control" readonly name="kpost[]">                             
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <input type="text" required name="kcode[]" id="kpostA3" class="form-control" autofocus>
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postB2}}</label>
							<div class="col-lg-1 col-sm-1">
								<input type="text" value="B" class="form-control" readonly name="kpost[]">                             
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <input type="text" required name="kcode[]" id="kpostB2" class="form-control">
                            </div>
							<label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postB3}}</label>
							<div class="col-lg-1 col-sm-1">
								<input type="text" value="B" class="form-control" readonly name="kpost[]">                             
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <input type="text" required name="kcode[]" id="kpostB3" class="form-control">
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postC2}}</label>
							<div class="col-lg-1 col-sm-1">
								<input type="text" value="C" class="form-control" readonly name="kpost[]">                             
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <input type="text" required name="kcode[]" id="kpostC2" class="form-control">
                            </div>
							<label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postC3}}</label>
							<div class="col-lg-1 col-sm-1">
								<input type="text" value="C" class="form-control" readonly name="kpost[]">                             
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <input type="text" required name="kcode[]" id="kpostC3" class="form-control">
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postD2}}</label>
							<div class="col-lg-1 col-sm-1">
								<input type="text" value="D" class="form-control" readonly name="kpost[]">                             
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <input type="text" required name="kcode[]" id="kpostD2" class="form-control">
                            </div>
							<label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postD3}}</label>
							<div class="col-lg-1 col-sm-1">
								<input type="text" value="D" class="form-control" readonly name="kpost[]">                             
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <input type="text" required name="kcode[]" id="kpostD3" class="form-control">
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">&nbsp;</label>
                            <div class="col-lg-4 col-sm-4">
                                <button class="btn btn-primary" type="submit">{{$lb_save}}</button>
                                <button class="btn btn-danger" type="reset" id="btnCancel">{{$lb_cancel}}</button>
                            </div>
                        </div>
				</div>
				<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
					<label> <i class="fa fa-align-justify"></i> <strong> {{$lb_thai_lottery}}</strong></label>
					<label></label>
					<label><input type="radio" name="shift_th" checked value="day" id="day_th"> {{$lb_day}}</label>
                    <label><input type="radio" name="shift_th" value="night" id="night_th"> {{$lb_night}}</label>
									<div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postA2}}</label>
                            <div class="col-lg-1 col-sm-1">
								<input type="text" value="A" class="form-control" readonly name="tpost[]">                             
                            </div>
							<div class="col-lg-3 col-sm-3">
								<input type="text" required name="tcode[]" id="tpostA2" class="form-control" autofocus>
							</div>
							<label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postA3}}</label>
							<div class="col-lg-1 col-sm-1">
								<input type="text" value="A" class="form-control" readonly name="tpost[]">                             
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <input type="text" required name="tcode[]" id="tpostA3" class="form-control" autofocus>
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postB2}}</label>
							<div class="col-lg-1 col-sm-1">
								<input type="text" value="B" class="form-control" readonly name="tpost[]">                             
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <input type="text" required name="tcode[]" id="tpostB2" class="form-control">
                            </div>
							<label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postB3}}</label>
							<div class="col-lg-1 col-sm-1">
								<input type="text" value="B" class="form-control" readonly name="tpost[]">                             
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <input type="text" required name="tcode[]" id="tpostB3" class="form-control">
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postC2}}</label>
							<div class="col-lg-1 col-sm-1">
								<input type="text" value="C" class="form-control" readonly name="tpost[]">                             
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <input type="text" required name="tcode[]" id="tpostC2" class="form-control">
                            </div>
							<label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postC3}}</label>
							<div class="col-lg-1 col-sm-1">
								<input type="text" value="C" class="form-control" readonly name="tpost[]">                             
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <input type="text" required name="tcode[]" id="tpostC3" class="form-control">
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postD2}}</label>
							<div class="col-lg-1 col-sm-1">
								<input type="text" value="D" class="form-control" readonly name="tpost[]">                             
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <input type="text" required name="tcode[]" id="tpostD2" class="form-control">
                            </div>
							<label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postD3}}</label>
							<div class="col-lg-1 col-sm-1">
								<input type="text" value="D" class="form-control" readonly name="tpost[]">                             
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <input type="text" required name="tcode[]" id="tpostD3" class="form-control">
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">&nbsp;</label>
                            <div class="col-lg-4 col-sm-4">
                                <button class="btn btn-primary" type="submit">{{$lb_save}}</button>
                                <button class="btn btn-danger" type="reset" id="btnCancel">{{$lb_cancel}}</button>
                            </div>
                        </div>
				</div>
				<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
					<label> <i class="fa fa-align-justify"></i> <strong> {{$lb_vietnamese_lottery}}</strong></label>
					<label></label>
					<label><input type="radio" name="shift_vt" checked value="day" id="day_vt" onchange="changeday()"> {{$lb_day}}</label>
                    <label><input type="radio" name="shift_vt" value="night" id="night_vt" onchange="changeday()"> {{$lb_night}}</label>
					<div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postA2}}</label>
                            <div class="col-lg-1 col-sm-1">
								<input type="text" value="A" class="form-control" readonly name="vpost[]">                             
                            </div>
							<div class="col-lg-3 col-sm-3">
								<div class="form-group row">
									<div class="col-lg-3 col-sm-3" style="padding-right: 0px !important;">
										<input type="text" required name="vcode[]" id="post_vtA2_1" class="form-control" autofocus>									
									</div>
									<div class="col-lg-3 col-sm-3" style="padding-right: 5px !important; padding-left:10px !important;">
										<input type="text" required name="vcode[]" id="post_vtA2_2" class="form-control" readonly>									
									</div>
									<div class="col-lg-3 col-sm-3" style="padding-right: 10px !important; padding-left:5px !important;">
										<input type="text" required name="vcode[]" id="post_vtA2_3" class="form-control" readonly>									
									</div>
									<div class="col-lg-3 col-sm-3" style="padding-left:0px !important;">
										<input type="text" required name="vcode[]" id="post_vtA2_4" class="form-control" readonly>									
									</div>
								</div>
							</div>
							<label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postA3}}</label>
							<div class="col-lg-1 col-sm-1">
								<input type="text" value="A" class="form-control" readonly name="vpost[]">                             
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                	<div class="form-group row">
									<div class="col-lg-4 col-sm-4" style="padding-right: 0px !important;">
										<input type="text" required name="vcode[]" id="post_vtA3_1" class="form-control" autofocus>									
									</div>
									<div class="col-lg-4 col-sm-4" style="padding-right: 5px !important; padding-left:10px !important;">
										<input type="text" required name="vcode[]" id="post_vtA3_2" class="form-control" readonly>									
									</div>
									<div class="col-lg-4 col-sm-4" style="padding-right: 10px !important; padding-left:5px !important;">
										<input type="text" required name="vcode[]" id="post_vtA3_3" class="form-control" readonly>									
									</div>								
								</div>
                            </div>
                        </div>
					<div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postBD}}</label>
							 <div class="col-lg-1 col-sm-1">
								<input type="text" value="BD" class="form-control" readonly name="vpost[]">                             
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <input type="text" required name="vpostBD" id="vpostBD" class="form-control" autofocus>
                            </div>
							<div class="col-lg-4 col-sm-4">
								<a href="#" class="btn btn-xs btn-xx btn-primary" onclick="btn_go()">{{$lb_go}}</a>
							</div>
						</div>
						<div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postB2}}</label>
							<div class="col-lg-1 col-sm-1">
								<input type="text" value="B" class="form-control" readonly name="vpost[]">                             
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <input type="text" required name="vcode[]" id="vpostB2" class="form-control" readonly>
                            </div>
							<label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postB3}}</label>
							<div class="col-lg-1 col-sm-1">
								<input type="text" value="B" class="form-control" readonly name="vpost[]">                             
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <input type="text" required name="vcode[]" id="vpostB3" class="form-control" readonly>
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postC2}}</label>
							<div class="col-lg-1 col-sm-1">
								<input type="text" value="C" class="form-control" readonly name="vpost[]">                             
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <input type="text" required name="vcode[]" id="vpostC2" class="form-control" readonly>
                            </div>
							<label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postC3}}</label>
							<div class="col-lg-1 col-sm-1">
								<input type="text" value="C" class="form-control" readonly name="vpost[]">                             
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <input type="text" required name="vcode[]" id="vpostC3" class="form-control" readonly>
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postD2}}</label>
							<div class="col-lg-1 col-sm-1">
								<input type="text" value="D" class="form-control" readonly name="vpost[]">                             
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <input type="text" required name="vcode[]" id="vpostD2" class="form-control" readonly>
                            </div>
							<label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postD3}}</label>
							<div class="col-lg-1 col-sm-1">
								<input type="text" value="D" class="form-control" readonly name="vpost[]">                             
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <input type="text" required name="vcode[]" id="vpostD3" class="form-control" readonly>
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">&nbsp;</label>
                            <div class="col-lg-4 col-sm-4">
                                <button class="btn btn-primary" type="submit">{{$lb_save}}</button>
                                <button class="btn btn-danger" type="reset" id="btnCancel">{{$lb_cancel}}</button>
                            </div>
                        </div>
				</div>
				<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
					<label> <i class="fa fa-align-justify"></i> <strong> ឆ្នោតទ្បូ</strong></label>
					<label></label>
					<label><input type="radio" name="shift_lo" checked value="day" id="day_lo"> {{$lb_day}}</label>
                    <label><input type="radio" name="shift_lo" value="night" id="night_lo"> {{$lb_night}}</label>
					<div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_postLO}}</label>
                            <div class="col-lg-4 col-sm-4">
                                <input type="text" required name="postLO" id="postLO" class="form-control" autofocus>
                            </div>
							<div class="col-lg-4 col-sm-4">
								<a href="#" class="btn btn-xs btn-xx btn-primary" onclick="btn_golo()">{{$lb_go}}</a>
							</div>
						</div>
						<div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_lolist}}</label>
							<div class="col-lg-4 col-sm-4">
								<table width="100%">
								<tr>
								<td>
								<table class="tbl">
									<thead>
										<th>{{$lb_lo2}}</th>
									</thead>
									<tbody id="lolist2">
									
									</tbody>
								</table>
								</td>
								<td valign="top">
								<table class="tbl">
									<thead>
										<th>{{$lb_lo3}}</th>
									</thead>
									<tbody id="lolist3">
									
									</tbody>
								</table>
								</td>
								</tr>
								</table>
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">&nbsp;</label>
                            <div class="col-lg-4 col-sm-4">
                                <button class="btn btn-primary" type="submit">{{$lb_save}}</button>
                                <button class="btn btn-danger" type="reset" id="btnCancel">{{$lb_cancel}}</button>
                            </div>
                        </div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('js')
	<script src="{{asset('js/result.js')}}"></script>
@endsection