@extends('web.layouts.app')
@section('title',$project->title .' - '.$user->full_name)
@section('content')
    @include('web.includes.header-nav')

    <div id="blog" class="container-fluid">
        <div class="blog-head" style="background: rgba(0,0,0,0.75) url('{{$project->image_url}}') center center no-repeat; background-size: cover; background-blend-mode: darken">
            <h1 class="primary text-uppercase text-center">{{$project->title}}</h1>
        </div>
        <div id="post" class="container my-3">
            {!!$project->blog!!}
        </div>
        <div class="container my-2 mb-3 text-center">
            <a href="{{$project->link}}" class="btn main-button"><i class="fas fa-external-link-square-alt mr-1"></i> @lang('view project')</a>
        </div>
    </div>
@endsection

@section('scripts')

@stop