@extends('layouts.app')

@section('sidebar')
    @include('group1/sidebar')
@endsection

@section('content')

    <div class="container-fluid nopadding">

        <div class="row">
            <div class="col stats_cage">
                <div class="stat_label"><?php echo date("M j Y"); ?></div>
                <div class="stat_value">{{ $group_count_today }}</div>
            </div>
            <div class="col stats_cage">
                <div class="stat_label">Abandons</div>
                <div class="stat_value">{{ $group_abandon_count_today }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <canvas id="yeah_count_chart" height="400" width="auto"></canvas>
            </div>
        </div>
        
    </div>

    <script>
    $(document).ready(function () {

        var ctx = document.getElementById("yeah_count_chart").getContext('2d');
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
                maintainAspectRatio: false,
                elements: {
                    line: {
                        tension: 0, // disables bezier curves
                    }
                }
            }
        });
    });
    </script>

@endsection