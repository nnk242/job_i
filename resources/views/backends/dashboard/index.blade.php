@extends('layouts.app')
@section('contents')
    @include('message.message')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-6">
                <canvas id="myChart1"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="myChart2"></canvas>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Script jquery -->
    <script src="{{asset('jquery/jquery.js')}}" type="text/javascript"></script>
    <!-- HTML -->
    <script src="{{asset('chart//Chart.min.js')}}"></script>
    <script>
        var ctx = document.getElementById('myChart1').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ["{{$arr_days[0]}}", "{{$arr_days[1]}}", "{{$arr_days[2]}}", "{{$arr_days[3]}}", "{{$arr_days[4]}}", "{{$arr_days[5]}}", "{{$arr_days[6]}}"],
                datasets: [{
                    label: "View per day",
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [{{$arr_views[0]}}, {{$arr_views[1]}}, {{$arr_views[2]}}, {{$arr_views[3]}}, {{$arr_views[4]}}, {{$arr_views[5]}}, {{$arr_views[6]}}],
                }]
            },

            // Configuration options go here
            options: {}
        });
        var ctx = document.getElementById('myChart2').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "My First dataset",
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [0, 10, 5, 2, 20, 30, 45],
                }]
            },

            // Configuration options go here
            options: {}
        });
    </script>
@endsection
