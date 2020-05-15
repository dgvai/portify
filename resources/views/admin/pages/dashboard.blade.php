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
            <x-dg-small-box :title="__('server Health')" text="0" bg="secondary" icon="fas fa-heartbeat" :url="route('server.monitor')" />
        </div>
    </div>
@stop

@section('js')
@include('sweetalert::alert')


@stop