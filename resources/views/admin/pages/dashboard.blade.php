@extends('adminlte::page')
@section('title', __('Dashboard'))

@section('content')
    <div class="row">
        <div class="col-md-3">
            <x-dg-small-box :title="__('New Visitors')" text="0" bg="info" icon="fas fa-user-plus" />
        </div>
        <div class="col-md-3">
            <x-dg-small-box :title="__('New Downloads')" text="0" bg="success" icon="fas fa-file-download" />
        </div>
        <div class="col-md-3">
            <x-dg-small-box :title="__('New Inboxes')" text="0" bg="warning" icon="fas fa-inbox" />
        </div>
        <div class="col-md-3">
            <x-dg-small-box :title="__('Server Health')" text="0" bg="secondary" icon="fas fa-heartbeat" :url="route('server.monitor')" />
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <x-dg-card :title="__('Daily Visitors')" bg="dark" :full="true">
                <canvas id="visitors"></canvas>
            </x-dg-card>
        </div>
    </div>
@stop

@section('js')
@include('sweetalert::alert')

<script>
    $(() => {
        $.get("{{route('get.visitor')}}", {}, function (data) {
            let visitors = $('#visitors');
            let chart = new Chart(visitors, {
                type: 'line',
                data: data,
                options: {
                    legend: {
                        labels: {
                            fontColor: "white",
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                fontColor: "white",
                                beginAtZero: true,
                                stepSize: 1
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                fontColor: "white",
                            }
                        }]
                    },
                    title: {
                        display: true,
                        fontColor : "white",
                        text: 'Daily Visitors'
                    }
                }
            });
        });
    });
</script>
@stop