@extends('adminlte::page')
@section('title', __('Dashboard'))

@section('content')
    <div class="row">
        <div class="col-md-3">
            <x-dg-small-box :title="__('Todays Visitors')" :text="$data->visitor" bg="info" icon="fas fa-user-plus" />
        </div>
        <div class="col-md-3">
            <x-dg-small-box :title="__('Todays Downloads')" :text="$data->download" bg="success" icon="fas fa-file-download" />
        </div>
        <div class="col-md-3">
            <x-dg-small-box :title="__('Unread Inboxes')" :text="$data->inbox" bg="warning" icon="fas fa-inbox" :url="route('inbox')"/>
        </div>
        <div class="col-md-3">
            <x-dg-small-box :title="__('My Projects')" :text="$data->projects" bg="secondary" icon="fas fa-paper-plane" :url="route('portfolio.projects')" />
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <x-dg-card :title="__('Daily Visitors')" bg="info" :full="true">
                <canvas id="visitors"></canvas>
            </x-dg-card>
        </div>
        <div class="col-md-6">
            <x-dg-card :title="__('Daily Downloads')" bg="success" :full="true">
                <canvas id="downloads"></canvas>
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
                                stepSize: 10
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
        $.get("{{route('get.downloads')}}", {}, function (data) {
            let downloads = $('#downloads');
            let chart = new Chart(downloads, {
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
                                stepSize: 10
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
                        text: 'Daily Downloads'
                    }
                }
            });
        });
    });
</script>
@stop