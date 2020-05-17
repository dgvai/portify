@php 
use App\Models\System\Configuration;
@endphp

@extends('adminlte::page')
@section('title', __('My Resume'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="toggle-resume" data-toggle="tooltip" title="Click to toggle">
                @if(Configuration::get('enable_resume'))
                <x-dg-info-box title="Resume Download" bg="success" text="Enabled" icon="fas fa-check" :full="true" />
                @else 
                <x-dg-info-box title="Resume Download" bg="warning" text="Disabled" icon="fas fa-info" :full="true" />
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div data-toggle="modal" data-target="#resume-uploader">
            <x-dg-info-box title="Add/Update" text="Resume" icon="fas fa-plus" bg="primary" :full="true" />
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <embed src="{{$user->resume->file_path}}" style="width:100%; height: 80vh"/>
        </div>
    </div>

    <x-dg-modal title="Resume" id="resume-uploader">
        <form action="{{route('portfolio.resume.upload')}}" method="POST" enctype="multipart/form-data">
            @csrf 
            <x-dg-input-file name="resume" id="file" :label="__('Upload Resume')" :placeholder="__('Choose pdf file to upload')" :required="true"/>
        </form>
    </x-dg-modal>
@stop

@section('js')
@include('sweetalert::alert')
    <script>
        $(()=>{
            $('.toggle-resume').click(()=>{
                $.post("{{route('portfolio.resume.toggle')}}",{_token:'{{csrf_token()}}'},()=>{
                    this.location.reload();
                });
            });
        });
    </script>
@stop