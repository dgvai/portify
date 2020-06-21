@extends('web.layouts.app')
@section('title',$user->full_name)
@section('content')
    @include('web.includes.portfolio')

    <div id="intro" class="container-fluid gray-bg d-flex align-items-center justify-content-center">
        <div class="white-box wow fadeInUp">
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

    <div id="services" class="container-fluid light-bg d-flex flex-column align-items-center justify-content-center">
        <h1 class="primary font-medium text-uppercase">@lang('Services, I provide with passion')</h1>
        <div class="service-items">
            @foreach($user->services as $service)
            <div class="item d-flex flex-column text-center wow fadeInUp">
                <img src="{{$service->svg_icon}}" class="icon"/>
                <div class="text-uppercase my-3 font-medium">{{$service->title}}</div>
                <div class="text-center text">{{$service->description}}</div>
            </div>
            @endforeach
        </div>
    </div>

    <div id="skills" class="container-fluid gray-bg d-flex flex-column align-items-center justify-content-center">
        <h1 class="primary font-medium text-uppercase">@lang('My Skills')</h1>
        <div class="container">
            @foreach($user->skills as $skill)
            <div class="progress-outer">
                <div class="progress">
                    <div class="progress-bar progress-bar-info progress-bar-striped" data-percent="{{$skill->percent}}"
                    data-toggle="tooltip" title="{{$skill->name.' - '.$skill->percent.'%'}}"></div>
                    <div class="progress-name">{{$skill->name}}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div id="projects" class="container-fluid gray-bg d-flex flex-column align-items-center justify-content-center">
        <h1 class="light font-medium text-uppercase mb-5">@lang('My recent projects')</h1>
        <div class="container">
            <div class="project-items owl-carousel owl-theme">
                @foreach($user->projects as $project)
                <div class="row justify-content-center">
                    <div class="white-box item col-md-10 col-10">
                        <div class="poster"><img class="img-responsive" src="{{$project->image_url}}"/></div>
                        <div class="data">
                            <h3 class="primary font-medium">{{$project->title}}</h3>
                            <p class="small">{{$project->description}}</p>
                            <div class="bot-btn">
                                @if($project->has_blog)
                                <a href="{{route('project.show',['project' => $project->id, 'slug' => slugify($project->title)])}}" class="outline-button">
                                    <i class="fas fa-external-link-square-alt mr-1"></i> @lang('view blog')
                                </a>
                                @else 
                                <a href="{{$project->link}}" class="outline-button" target="_blank">
                                    <i class="fas fa-external-link-square-alt mr-1"></i> @lang('view project')
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="gallery" class="container-fluid gray-bg">
        <h1 class="primary font-medium text-uppercase text-center mb-4">@lang('Photo Gallery')</h1>
        <div class="grid">
            @foreach($user->galleries as $photo)
            @php 
            $size = getimagesize($photo->image_url);
            $class = ($size[0] < $size[1]) ? 'item--large' : 'item--medium';
            @endphp
            <div class="item {{$class}}" style="background: url('{{$photo->image_url}}'); background-size: cover; background-position: center"
                data-link="{{$photo->image_url}}">
                <div class="item__details">
                    {{$photo->caption}}
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @if(App\Models\System\Configuration::get('enable_resume') == 1)
    <div id="resume" class="container-fluid">
        <h1 class="primary wow fadeInUp">@lang('Willing to hire me?')</h1>
        <p class=" wow fadeInUp">@lang('Why not see my resume!')</p>
        <a href="{{route('download')}}" class="main-button wow fadeInUp"><i class="fas fa-file-download mr-2"></i> Download Resume</a>
    </div>
    @endif

    <div class="modal fade" id="gallery-modal" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <img id="preview" src="" class="img-responsive" width="100%" />
                </div>
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
                autoplay : true,
                responsive : {
                    0 : {
                        items:1,
                        dots: false
                    },
                    768: {
                        items:1
                    }
                }
            });

            $('#skills').waypoint(function(){
                $('#skills .progress-bar').each(function(i){
                    $(this).css('width',$(this).data('percent')+'%');
                    $(this).addClass('active');
                });
            });

            $('.item').click(function(){
                $('#preview').attr('src',$(this).data('link'));
                $('#gallery-modal').modal('show');
            })
        });
    </script>
@endsection