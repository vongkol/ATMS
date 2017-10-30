@extends('layouts.app')
@section('content')
    <div class="row" style="margin-top: 18px">
        <div class="col-sm-6 col-lg-3" style="text-align: center;">
            <img src="{{asset('profile/logo.png')}}" style="width: 108px;">
            <p style="padding-top: 10px; text-align: center; font-weight: bold;">ប្រព័ន្ធគ្រប់គ្រងវត្តមានរបស់ការិយាល័យពត៌មានវិទ្យា នៃសេនាធិការដ្ឋាននៃអគ្គស្នងការនគរបាលជាតិ</p>
        </div>
        <!--/.col-->

        <div class="col-sm-6 col-lg-3">
            <div class="card card-inverse card-info">
                <div class="card-block pb-0">
                    <h4 class="mb-0">{{$employees}}</h4>
                    <p>Employee (s)</p>
                </div>
                <div class="chart-wrapper px-3" style="height:70px;">
                    <canvas id="card-chart2" class="chart" height="70"></canvas>
                </div>
            </div>
        </div>
        <!--/.col-->

        <div class="col-sm-6 col-lg-3">
            <div class="card card-inverse card-warning">
                <div class="card-block pb-0">
                    <h4 class="mb-0">{{$leaves}}</h4>
                    <p>Leave (s)</p>
                </div>
                <div class="chart-wrapper" style="height:70px;">
                    <canvas id="card-chart3" class="chart" height="70"></canvas>
                </div>
            </div>
        </div>
        <!--/.col-->

        <div class="col-sm-6 col-lg-3">
            <div class="card card-inverse card-danger">
                <div class="card-block pb-0">
                    <h4 class="mb-0">{{$tams}}</h4>
                    <p>Absent (s)</p>
                </div>
                <div class="chart-wrapper px-3" style="height:70px;">
                    <canvas id="card-chart4" class="chart" height="70"></canvas>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection
