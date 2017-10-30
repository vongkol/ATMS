@extends('layouts.app')
@section('content')
    <?php $lang = Auth::user()->language=="kh"?'kh.php':'en.php'; ?>
    <?php include(app_path()."/lang/". $lang); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> ទិន្នន័យម៉ាស៊ីនស្គេន&nbsp;&nbsp;
                </div>
                <div class="card-block">
                    <table class="table table-condensed table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>{{$lb_id}}</th>
                            <th>អត្តលេខ</th>   
                            <th>ឈ្មោះ</th>    
                            <th>កាលបរិច្ឆេទ</th> 
                            <th>ម៉ោង</th>                
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($accesslogs as $log)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$log->fingerprint}}</td>   
                                <td>{{$log->emp_name}}</td>  
                                <td>{{$log->date}}</td>      
                                <td>{{$log->time}}</td>                                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection