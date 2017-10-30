@extends('layouts.app')
@section('content')
    <?php $lang = Auth::user()->language=="kh"?'kh.php':'en.php'; ?>
    <?php include(app_path()."/lang/". $lang); ?>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> {{$lb_result_list}}&nbsp;&nbsp;
                    <a href="{{url('/result/create')}}" class="btn btn-link btn-sm">{{$lb_new}}</a>
                </div>
				<div class="card-block">
					<div class="form-group row">
						<div class="col-lg-2">
							<label> <i class="fa fa-calendar"></i> <strong>កាលបរិច្ឆេទ លទ្ធផលឆ្នោត </strong></label>
						</div>
						<div class="col-lg-3">
							<input type="date" required name="resultdate" id="resultdate" class="form-control" autofocus>							
						</div>
						<a href="#" class="btn btn-xs btn-xx btn-primary">បង្ហាញលទ្ធផល</a>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">							
							<label> <i class="fa fa-align-justify"></i> <strong> លទ្ធផលឆ្នោត យួន ថ្ងៃ (xx = 7000R, xxx = 60000R)</strong></label>					
							<table class="tbl" id="tblvnday">
								<thead>
									<tr>
										<th class="text-center">A</th>
										<th class="text-center">B</th>
										<th class="text-center">C</th>
										<th class="text-center">D</th>										
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-center">២ លេខ មាន ១ ខ្ទង់</td>
										<td class="text-center">២ លេខ មាន ១ ខ្ទង់</td>
										<td class="text-center">២ លេខ មាន ១ ខ្ទង់</td>
										<td class="text-center">២ លេខ មាន ១ ខ្ទង់</td>
									</tr>
									<tr>
										<td class="text-center" id="vd2a"></td>
										<td class="text-center" id="vd2b"></td>
										<td class="text-center" id="vd2c"></td>
										<td class="text-center" id="vd2d"></td>
									</tr>
									<tr>
										<td class="text-center">៣ លេខ មាន ១ ខ្ទង់</td>
										<td class="text-center">៣ លេខ មាន ១ ខ្ទង់</td>
										<td class="text-center">៣ លេខ មាន ១ ខ្ទង់</td>
										<td class="text-center">៣ លេខ មាន ១ ខ្ទង់</td>
									</tr>
									<tr>
										<td class="text-center" id="vd3a"></td>
										<td class="text-center" id="vd3b"></td>
										<td class="text-center" id="vd3c"></td>
										<td class="text-center" id="vd3d"></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="col-lg-6">
							<label> <i class="fa fa-align-justify"></i> <strong> លទ្ធផលឆ្នោត យួន យប់ (xx = 7000R, xxx = 60000R)</strong></label>					
							<table class="tbl" id="tblvnnight">
								<thead>
									<tr>
										<th class="text-center">A</th>
										<th class="text-center">B</th>
										<th class="text-center">C</th>
										<th class="text-center">D</th>										
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-center">២ លេខ មាន ៤ ខ្ទង់</td>
										<td class="text-center">២ លេខ មាន ១ ខ្ទង់</td>
										<td class="text-center">២ លេខ មាន ១ ខ្ទង់</td>
										<td class="text-center">២ លេខ មាន ១ ខ្ទង់</td>
									</tr>
									<tr>
										<td class="text-center">
											<table border="0" width="100%">
												<tr>
													<td class="text-center" id="vn2a1"></td>
													<td class="text-center" id="vn2a2"></td>
													<td class="text-center" id="vn2a3"></td>
													<td class="text-center" id="vn2a4"></td>
												</tr>
											</table>
										</td>
										<td class="text-center" id="vn2b"></td>
										<td class="text-center" id="vn2c"></td>
										<td class="text-center" id="vn2d"></td>
									</tr>
									<tr>
										<td class="text-center">៣ លេខ មាន ៣ ខ្ទង់</td>
										<td class="text-center">៣ លេខ មាន ១ ខ្ទង់</td>
										<td class="text-center">៣ លេខ មាន ១ ខ្ទង់</td>
										<td class="text-center">៣ លេខ មាន ១ ខ្ទង់</td>
									</tr>
									<tr>
										<td class="text-center">
											<table border="0" width="100%">
												<tr>
													<td class="text-center" id="vn3a1"></td>
													<td class="text-center" id="vn3a2"></td>
													<td class="text-center" id="vn3a3"></td>
												</tr>
											</table>
										</td>
										<td class="text-center" id="vn3b"></td>
										<td class="text-center" id="vn3c"></td>
										<td class="text-center" id="vn3d"></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label> <i class="fa fa-align-justify"></i> <strong> លទ្ធផលឆ្នោត ខ្មែរ (xx = 9000R, xxx = 80000R)</strong></label>					
							<table class="tbl" id="tblkhmer">
								<thead>
									<tr>
										<th class="text-center">ទី១ ចេញ 1:00 <br/>ឈប់យក 12:40</th>
										<th class="text-center">ទី២ ចេញ 3:45 <br/>ឈប់យក 3:20</th>
										<th class="text-center">ទី៣​ ចេញ  6:00 <br/>ឈប់យក 5:40</th>
										<th class="text-center">ទី៤ ចេញ 7:45 <br/>ឈប់យក 7:25</th>										
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-center">
											<table border="0" width="100%">
												<tr>
													<td class="text-center" id="kt12"></td>
													<td class="text-center" id="kt13"></td>
												</tr>
											</table>
										</td>
										<td class="text-center">
											<table border="0" width="100%">
												<tr>
													<td class="text-center" id="kt22"></td>
													<td class="text-center" id="kt23"></td>
												</tr>
											</table>
										</td>
										<td class="text-center">
											<table border="0" width="100%">
												<tr>
													<td class="text-center" id="kt32"></td>
													<td class="text-center" id="kt33"></td>
												</tr>
											</table>
										</td>
										<td class="text-center">
											<table border="0" width="100%">
												<tr>
													<td class="text-center" id="kt42"></td>
													<td class="text-center" id="kt43"></td>
												</tr>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="col-lg-6">
							<label> <i class="fa fa-align-justify"></i> <strong> លទ្ធផលឆ្នោត ទ្បូ (xx = 7000R, xxx = 60000R)</strong></label>	
							<table class="tbl" id="tblkhmer">
								<thead>
									<tr>
										<th class="text-center">ថ្ងៃ</th>
										<th class="text-center">យប់</th>																			
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-center">
											<table border="0" width="100%">
												<tr>
													<td class="text-center">២ លេខ = ២៥ ខ្ទង់</td>
													<td class="text-center">៣ លេខ = ១៩ ខ្ទង់</td>
												</tr>
											</table>
										</td>
										<td class="text-center">
											<table border="0" width="100%">
												<tr>
													<td class="text-center">២ លេខ = ៣២ ខ្ទង់</td>
													<td class="text-center">៣ លេខ = ២៥ ខ្ទង់</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td class="text-center">
											<table border="0" width="100%">
												<tr>
													<td class="text-center">
														<table border="0" width="100%" id="tbl2dlo">
															<tr>
																
															</tr>
														</table>
													</td>
													<td class="text-center">
														<table border="0" width="100%" id="tbl3dlo">
															<tr>
																
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
										<td class="text-center">
											<table border="0" width="100%">
												<tr>
													<td class="text-center">
														<table border="0" width="100%" id="tbl2nlo">
															<tr>
																
															</tr>
														</table>
													</td>
													<td class="text-center">
														<table border="0" width="100%" id="tbl3nlo">
															<tr>
																
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
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