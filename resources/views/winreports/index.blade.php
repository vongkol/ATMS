@extends('layouts.app')
@section('content')
	<?php $lang = Auth::user()->language=="kh"?'kh.php':'en.php'; ?>
    <?php include(app_path()."/lang/". $lang); ?>
	<div class="row">
        <div class="col-lg-12">
            <div class="card">
				 <div class="card-header text-bold">
					<label> <i class="fa fa-align-justify"></i> <strong> របាយការណ៍អ្នកឈ្នះ:</strong></label>
                </div>
                <div class="card-block">
					<form action="#" class="form-horizontal checkbox-head">		
					<div class="form-group row">
						 <label for="name" class="control-label col-lg-1 col-sm-1">កាលបរិច្ឆេទ</label>
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
							<label for="name" class="control-label col-lg-2 col-sm-2">ច្រោះទិន្នន័យ</label>
                            <div class="col-lg-3 col-sm-3">
                                <select class="form-control" name="daytype" id="filter">
									<option value=""></option>
									<option value="Day">លេខចាក់ច្រើនជាងគេ</option>
									<option value="Day">ទឹកលុយចាក់ច្រើនជាងគេ</option>
								</select>
                            </div>
                    </div>			
					<div class="form-group row">
						<div class="col-lg-12">
							<table class="tbl">
								<thead>
									<tr>
										<th class="text-center">A</th>
										<th class="text-center">B</th>
										<th class="text-center">C</th>
										<th class="text-center">D</th>	
										<th class="text-center">LO</th>											
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-center">
											<table class="tbl" border="0" width="100%">
												<thead>
												<tr>
													<th class="text-center">២​ លេខ</th>
													<th class="text-center">ទឹកប្រាក់</th>
													<th class="text-center">៣​ លេខ</th>
													<th class="text-center">ទឹកប្រាក់</th>
												</tr>
												</thead>
												<tbody>
												<tr>
													<td class="text-center"><a href="#" data-toggle="tooltip" data-placement="top" title="អ្នកឈ្នៈ xxx ទឹកប្រាក់ដើមៈ 500">XX</a></td>
													<td class="text-center">1,000</td>
													<td class="text-center">XXX</td>
													<td class="text-center">1,000</td>
												</tr>
												<tr style="background-color: yellow;">
													<td></td>
													<td class="text-center"><b>1,000</b></td>
													<td></td>
													<td class="text-center"><b>1,000</b></td>
												</tr>
												<tbody>
											</table>
										</td>
										<td class="text-center">
												<table class="tbl" border="0" width="100%">
												<thead>
												<tr>
													<th class="text-center">២​ លេខ</th>
													<th class="text-center">ទឹកប្រាក់</th>
													<th class="text-center">៣​ លេខ</th>
													<th class="text-center">ទឹកប្រាក់</th>
												</tr>
												</thead>
												<tbody>
												<tr>
													<td class="text-center">XX</td>
													<td class="text-center">1,000</td>
													<td class="text-center">XXX</td>
													<td class="text-center">1,000</td>
												</tr>
												<tr style="background-color: yellow;">
													<td></td>
													<td class="text-center"><b>1,000</b></td>
													<td></td>
													<td class="text-center"><b>1,000</b></td>
												</tr>
												<tbody>
											</table>
										</td>
										<td class="text-center">
												<table class="tbl" border="0" width="100%">
												<thead>
												<tr>
													<th class="text-center">២​ លេខ</th>
													<th class="text-center">ទឹកប្រាក់</th>
													<th class="text-center">៣​ លេខ</th>
													<th class="text-center">ទឹកប្រាក់</th>
												</tr>
												</thead>
												<tbody>
												<tr>
													<td class="text-center">XX</td>
													<td class="text-center">1,000</td>
													<td class="text-center">XXX</td>
													<td class="text-center">1,000</td>
												</tr>
												<tr style="background-color: yellow;">
													<td></td>
													<td class="text-center"><b>1,000</b></td>
													<td></td>
													<td class="text-center"><b>1,000</b></td>
												</tr>
												<tbody>
											</table>
										</td>
										<td class="text-center">
												<table class="tbl" border="0" width="100%">
												<thead>
												<tr>
													<th class="text-center">២​ លេខ</th>
													<th class="text-center">ទឹកប្រាក់</th>
													<th class="text-center">៣​ លេខ</th>
													<th class="text-center">ទឹកប្រាក់</th>
												</tr>
												</thead>
												<tbody>
												<tr>
													<td class="text-center">XX</td>
													<td class="text-center">1,000</td>
													<td class="text-center">XXX</td>
													<td class="text-center">1,000</td>
												</tr>
												<tr style="background-color: yellow;">
													<td></td>
													<td class="text-center"><b>1,000</b></td>
													<td></td>
													<td class="text-center"><b>1,000</b></td>
												</tr>
												<tbody>
											</table>
										</td>
										<td class="text-center">
												<table class="tbl" border="0" width="100%">
												<thead>
												<tr>
													<th class="text-center">២​ លេខ</th>
													<th class="text-center">ទឹកប្រាក់</th>
													<th class="text-center">៣​ លេខ</th>
													<th class="text-center">ទឹកប្រាក់</th>
												</tr>
												</thead>
												<tbody>
												<tr>
													<td class="text-center">XX</td>
													<td class="text-center">1,000</td>
													<td class="text-center">XXX</td>
													<td class="text-center">1,000</td>
												</tr>
												<tr style="background-color: yellow;">
													<td></td>
													<td class="text-center"><b>1,000</b></td>
													<td></td>
													<td class="text-center"><b>1,000</b></td>
												</tr>
												<tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
							<table class="tbl">
								<thead>
									<tr>
										<th style="width: 20%" class="text-center">ទឹកប្រាក់ឈ្នះសរុប A </th>
										<th style="width: 20%" class="text-center">ទឹកប្រាក់ឈ្នះសរុប B </th>
										<th style="width: 20%" class="text-center">ទឹកប្រាក់ឈ្នះសរុប C </th>
										<th style="width: 20%" class="text-center">ទឹកប្រាក់ឈ្នះសរុប D </th>
										<th style="width: 20%" class="text-center">ទឹកប្រាក់ឈ្នះសរុប LO </th>
									</tr>
								</thead>
								<tbody>
									<tr style="background-color: yellow;">
										<td class="text-center"><b>2,000</b></td>
										<td class="text-center"><b>2,000</b></td>
										<td class="text-center"><b>2,000</b></td>
										<td class="text-center"><b>2,000</b></td>
										<td class="text-center"><b>2,000</b></td>
									</tr>
								</tbody>
							</table>
							<table class="tbl" style="margin-top: 15px">
								<thead>
									<tr>
										<th style="width: 20%">ទឹកប្រាក់សរុបអ្នកឈ្នះ</th>
										<th style="width: 20%" class="text-center">10,000</th>
										<th style="width: 20%; border-style: hidden !important; background: #fff;" class="text-center"></th>
										<th style="width: 20%; border-style: hidden !important; background: #fff;" class="text-center"></th>
										<th style="width: 20%; border-style: hidden !important; background: #fff;" class="text-center"></th>
									</tr>
								</thead>
							</table>
							<table class="tbl">
								<thead>
									<tr>
										<th style="width: 20%">ទឹកប្រាក់លក់សរុបរបស់មេ </th>
										<th style="width: 20%" class="text-center">7,000</th>
										<th style="width: 20%; border-style: hidden !important; background: #fff;" class="text-center"></th>
										<th style="width: 20%; border-style: hidden !important; background: #fff;" class="text-center"></th>
										<th style="width: 20%; border-style: hidden !important; background: #fff;" class="text-center"></th>
									</tr>
								</thead>
							</table>
							<table class="tbl">
								<thead>
									<tr>
										<th style="width: 20%">ទឹកប្រាក់សរុបដែលមាន </th>
										<th style="width: 20%" class="text-center">​ -3,000</th>
										<th style="width: 20%; border-style: hidden !important; background: #fff;" class="text-center"></th>
										<th style="width: 20%; border-style: hidden !important; background: #fff;" class="text-center"></th>
										<th style="width: 20%; border-style: hidden !important; background: #fff;" class="text-center"></th>
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