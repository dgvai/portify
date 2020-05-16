@extends('adminlte::page')
@section('title', __('Basic Data'))

@section('content')
    <div class="row">
        <div class="col-md-6">
            <x-dg-card bg="primary" :title="__('Basic User Data')">
                <form action="{{route('portfolio.update.data')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <x-dg-input name="first_name" :label="__('First Name')" :value="$user->data->first_name" :required="true"/>
                        </div>
                        <div class="col-md-6">
                            <x-dg-input name="last_name" :label="__('Last Name')" :value="$user->data->last_name" :required="true"/>
                        </div>
                    </div>
                    <x-dg-input name="current_work" :label="__('Current Work')" :value="$user->data->current_work" :required="true"/>
                    <x-dg-input name="graduated" :label="__('Recently Graduated')" :value="$user->data->graduated" :required="true"/>
                    <x-dg-textarea name="bio" :label="__('Short Bio')" :required="true">{{$user->data->bio}}</x-dg-textarea>
                    <x-dg-submit :label="__('Save')" />
                </form>
            </x-dg-card>
        </div>
        <div class="col-md-6">
            <x-dg-card bg="primary" :title="__('User Cover')">
                <figure class="figure">
                    <img class="img-fluid figure-img" src="{{$user->cover_photo}}" />
                    <figcaption class="figure-caption text-center">@lang('Current Cover Photo')</figcaption>
                </figure>
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <x-dg-input-file name="photo" :label="__('Cover Photo')" :placeholder="__('Select an image file to upload')" :required="true"/>
                    <x-dg-submit :label="__('Save')" />
                </form>
            </x-dg-card>
        </div>
    </div>
@stop

@section('js')
@include('sweetalert::alert')

@stop