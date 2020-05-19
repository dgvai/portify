@extends('web.layouts.app')
@section('title','Sarah Dylen')
@section('content')
    @include('web.includes.portfolio')

    <div id="intro" class="container-fluid bg-gray d-flex align-items-center justify-content-center">
        <div class="white-box">
            <div class="user-data">
                <div class="summary text-justify">{{$user->data->bio}}</div>
                <div class="data text-uppercase">
                    <h2 class="primary">{{$user->full_name}}</h2>
                    <span class="d-block primary font-medium mt-4 mb-2">@lang('Working As')</span>
                    <span class="d-block">{{$user->data->current_work}}</span>
                    <span class="d-block primary font-medium mt-4 mb-2">@lang('Graduated From')</span>
                    <span class="d-block">{{$user->data->graduated}}</span>
                </div>
            </div>
        </div>
    </div>

    <div id="services" class="container-fluid bg-light d-flex flex-column align-items-center justify-content-center">
        <h1 class="primary font-medium text-uppercase">@lang('Services, I provide with passion')</h1>
        <div class="service-items">
            @foreach($user->services as $service)
            <div class="item d-flex flex-column text-center">
                <img src="{{$service->svg_icon}}" class="icon"/>
                <div class="text-uppercase my-3 font-medium">{{$service->title}}</div>
                <div class="text-center text">{{$service->description}}</div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
