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

    <div id="projects" class="container-fluid bg-gray d-flex flex-column align-items-center justify-content-center">
        <h1 class="light font-medium text-uppercase mb-5">@lang('My recent projects')</h1>
        <div class="container">
            <div class="project-items owl-carousel owl-theme">
                @foreach($user->projects as $project)
                <div class="row justify-content-center">
                    <div class="white-box item">
                        <div class="poster"><img class="img-responsive" src="{{$project->image_url}}"/></div>
                        <div class="data">
                            <h3 class="primary font-medium">{{$project->title}}</h3>
                            <p class="small">{{$project->description}}</p>
                            <div class="bot-btn">
                                <a href="{{$project->link}}" class="outline-button" target="_blank">
                                <i class="fas fa-external-link-square-alt mr-1"></i> @lang('view project')
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    @parent
    <script>
        $(()=>{
            let proj = $('.project-items');
            proj.on('initialize.owl.carousel', function(e){
                console.log('sdsds');
                var current = e.item.index;
                var src = $(e.target).find(".white-box.item").eq(current).find("img").attr('src');
                $('#projects').css({'background':`rgba(0, 0, 0, .85) url('${src}') center center`, 'background-blend-mode': 'darken', 'background-size' : 'cover', 'transition' : 'all 0.5s'});
            });

            proj.on('changed.owl.carousel', function(e) {
                var current = e.item.index;
                var src = $(e.target).find(".white-box.item").eq(current).find("img").attr('src');
                $('#projects').css({'background':`rgba(0, 0, 0, .85) url('${src}') center center`, 'background-blend-mode': 'darken', 'background-size' : 'cover', 'transition' : 'all 0.5s'});
            });
            
            proj.owlCarousel({
                nav : false,
                center:true,
                margin: 0,
                loop: true,
                singleItem:true,
                responsive : {
                    0 : {
                        items:1
                    }
                }
            });
        });
    </script>
@endsection