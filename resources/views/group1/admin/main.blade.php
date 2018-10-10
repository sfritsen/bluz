@extends('layouts.app')

@section('sidebar')
    @include('group1/sidebar')
@endsection

@section('content')

    <div class="container-fluid nopadding">
        <div class="row">
            <div class="col">
                <table class="table table-hover">
                    <tr>
                        <td><?php echo date("M j Y"); ?> Submissions</td>
                        <td>{{ $group_count_today }}</td>
                    </tr>
                    <tr>
                        <td>Abandons</td>
                        <td>{{ $group_abandon_count_today }}</td>
                    </tr>
                </table>
            </div>
            <div class="col">
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div id="testdata"></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <canvas id="myChart2" height="400" width="auto"></canvas>
            </div>
        </div>
        
    </div>

    <script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 28, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            // scales: {
            //     yAxes: [{
            //         ticks: {
            //             beginAtZero:true
            //         }
            //     }]
            // }
        }
    });

    $(document).ready(function () {

        var ctx = document.getElementById("myChart2").getContext('2d');
        var monthchart = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets : [
                {
                    label: {!! $chartyear !!}+' Submissions',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: {!! $chartdata !!}
                }
            ]
        };

        var linechart = new Chart(ctx, {
            type: 'line',
            data: monthchart,
            options: {
                maintainAspectRatio: false
            }
        });
    });
    </script>

@endsection