@extends('layouts.app')
@section('content')
    <?php $lang = Auth::user()->language=="kh"?'kh.php':'en.php'; ?>
    <?php include(app_path()."/lang/". $lang); ?>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header text-bold">
                    <i class="fa fa-user"></i> របាយការណ៍ចំណូលចំនាយ                 
                </div>
				<div class="card-block">
					<form action="#" class="form-horizontal checkbox-head">		
						<div class="form-group row">
                            <label for="name" class="control-label col-lg-1 col-sm-1">កាលបរិច្ឆេទចាប់ពី</label>
                            <div class="col-lg-3 col-sm-3">
								<input type="date" class="form-control">
                            </div>
							<label for="name" class="control-label col-lg-2 col-sm-2">រហូតដល់ថ្ងៃទី</label>
                            <div class="col-lg-3 col-sm-3">
								<input type="date" class="form-control">
                            </div>
						</div>
						<div class="form-group row">
                            <label for="name" class="control-label col-lg-1 col-sm-1">{{$lb_posttype}}</label>
                            <div class="col-lg-3 col-sm-3">
								<select class="form-control" name="lotterytype" id="lotterytype">
									<option value="Vietname">{{$lb_vietnamese_lottery}}</option>
									<option value="Khmer">{{$lb_khmer_lottery}}</option>
									<option value="Thai">{{$lb_thai_lottery}}</option>								
								</select>
                            </div>
							<label for="name" class="control-label col-lg-2 col-sm-2">{{$lb_daytype}}</label>
                            <div class="col-lg-3 col-sm-3">
                                <select class="form-control" name="daytype" id="daytype">
									<option value="Day">{{$lb_day}}</option>
									<option value="Night">{{$lb_night}}</option>
									<option value="T1">តង់ទី ១</option>
									<option value="T2">តង់ទី ២</option>
									<option value="T3">តង់ទី ៣</option>
									<option value="T4">តង់ទី ៤</option>
								</select>
                            </div>
						</div>
						<div class="form-group row">
                            <label for="name" class="control-label col-lg-1 col-sm-1">អ្នកលក់</label>
                            <div class="col-lg-3 col-sm-3">
								<select class="form-control" name="seller" id="seller">
									
								</select>
                            </div>						
                    </div>	
					<div class="form-group row">
						<div class="col-lg-12">
							<table class="tbl">
								<thead>
									<tr>
										<th style="width: 25%">ទឹកប្រាក់សរុបដែលមាន</th>
										<th>50,000</th>
									</tr>
								</thead>
							</table>
							<table class="tbl">
								<thead>
									<tr>
										<th style="width: 25%">ចំនូលពីការលក់ឆ្នោត ចំពោះមេ 70%</th>
										<th>7,000</th>
									</tr>
								</thead>
							</table>
							<table class="tbl">
								<thead>
									<tr>
										<th style="width: 25%">ចំនាយចំពោះអ្នកលក់ 30%</th>
										<th>3,000</th>
									</tr>
								</thead>
							</table>
							<table class="tbl">
								<thead>
									<tr>
										<th style="width: 25%">ចំនាយលើកូនចាក់ត្រូវ</th>
										<th>10,000</th>
									</tr>
								</thead>
							</table>
							<table class="tbl">
								<thead>
									<tr>
										<th style="width: 25%">ប្រាក់ចំនេញ ឫ ខាត</th>
										<th>-3,000</th>
									</tr>
								</thead>
							</table>
							<table class="tbl">
								<thead>
									<tr>
										<th style="width: 25%">សរុបទឹកប្រាក់ចុងក្រោយ</th>
										<th>47,000</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('js')
	<script src="{{asset('js/report.js')}}"></script>
@endsection