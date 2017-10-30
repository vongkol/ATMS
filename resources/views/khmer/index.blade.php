@extends('layouts.app')
@section('content')
    <?php $lang = Auth::user()->language=="kh"?'kh.php':'en.php'; ?>
    <?php include(app_path()."/lang/". $lang); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">

                </div>
                <div class="card-block">
                    <form action="#" class="form-horizontal checkbox-head">
						<input name="_token" type="hidden">
                        <label> <i class="fa fa-align-justify"></i> <strong> {{$lb_khmer_lottery}}:</strong></label>
                        <label><input type="checkbox" name="type" id="a"> &nbsp;A</label>
                        <label><input type="checkbox" name="type" id="b"> &nbsp;B</label>
                        <label><input type="checkbox" name="type" id="c"> &nbsp;C</label>
                        <label><input type="checkbox" name="type" id="d"> &nbsp;D</label>
						<label><input type="checkbox" name="type" id="lo">&nbsp; LO</label>
                        <label>|</label>
                        <label><input type="radio" name="shift" checked value="T1"> &nbsp;តង់ទី ១</label>
                        <label><input type="radio" name="shift" value="T2"> &nbsp;តង់ទី ២</label>
                        <label><input type="radio" name="shift" value="T3"> &nbsp;តង់ទី ៣</label>
                        <label><input type="radio" name="shift" value="T4"> &nbsp;តង់ទី ៤</label>
						<label><input type="radio" name="shift" value="T5"> &nbsp;តង់ទី ៥</label>
                        <a href="#" class="btn btn-xs btn-xx btn-success" data-toggle="modal" data-target="#myModal" style="width: 152px">ជ្រើសរើសអ្នកលក់</a>
						&nbsp;<span id="seller_name" class="text-danger text-bold"></span>
                        <hr>
                        <p>
                            <label>{{$lb_number}}: <input type="text" autofocus id="number"></label>
                            <label>{{$lb_amount}}: <input type="text" style="width: 80px" id="amount"> ({{$lb_riel}})</label>
                            <label>{{$lb_name .'-'. $lb_phone}}: <input type="text" id="cname"></label>

                            <a href="#" class="btn btn-xs btn-xx btn-primary" onclick="addToGrid()">{{$lb_add}}</a>
                            <a href="#" class="btn btn-xs btn-xx btn-danger" onclick="reset()">{{$lb_clear}}</a>
                        </p>
                    </form>
					<table class="tbl" id="tblall">
						<tr>
							<td valign="top">
								<table class="tbl" id="tbl2digit">
									<thead>
										<tr>
											<th></th>
											<th style="width: 50px">{{$lb_id}}</th>
											<th class="text-red">២ លេខ</th>
											<th>{{$lb_amount}}</th>
											<th class="text-center">A</th>
											<th class="text-center">B</th>
											<th class="text-center">C</th>
											<th class="text-center">D</th>
											<th class="text-center">LO</th> 											
										</tr>
									</thead>
									<tbody>
									
									</tbody>
								</table>
							</td>
							<td>
							</td>
							<td valign="top">
								<table class="tbl" id="tbl3digit">
									<thead>
										<tr>
											<th></th>
											<th style="width: 50px">{{$lb_id}}</th>
											<th class="text-red">៣ លេខ</th>
											<th>{{$lb_amount}}</th>
											<th class="text-center">A</th>
											<th class="text-center">B</th>
											<th class="text-center">C</th>
											<th class="text-center">D</th>   
											<th class="text-center">LO</th> 
										</tr>
									</thead>
									<tbody>
									
									</tbody>
								</table>
							</td>
						</tr>                                         
                    </table>
                    <p style="margin-top: 10px;">
                        <a href="#" class="btn btn-primary btn-xs btn-xx" onclick="save();">{{$lb_save}}</a>
                    </p>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection
@section('js')
 <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title pull-left" id="myModalLabel">ស្វែងរកអ្នកលក់</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search_name" id="search_name"
                                 placeholder="ឈ្មោះ ឬលេខទូរស័ព្ទ">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button" id="btnSearch">ស្វែងរក</button>
                                </span>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th>ឈ្មោះ</th>
                                </tr>
                                </thead>
                                <tbody id="data">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-flat" id="btnSelect" data-dismiss="modal">ជ្រើសរើស</button>
                    <button type="button" class="btn btn-danger btn-flat" id="btnClose" data-dismiss="modal">ចាកចេញ</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/khmer.js')}}"></script>
@endsection