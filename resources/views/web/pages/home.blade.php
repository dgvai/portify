@extends('web.layouts.app')
@section('title','Sarah Dylen')
@section('content')
    @include('web.includes.portfolio')

    <div id="intro" class="container-fluid gray-bg d-flex align-items-center justify-content-center">
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

    <div id="services" class="container-fluid light-bg d-flex flex-column align-items-center justify-content-center">
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

    <div id="resume" class="container-fluid">
        <h1 class="primary">@lang('Willing to hire me?')</h1>
        <p>@lang('Why not see my resume!')</p>
        <a href="#" class="main-button"><i class="fas fa-file-download mr-2"></i> Download Resume</a>
    </div>

    <div id="contact" class="container-fluid gray-bg d-flex align-items-center">
        <div class="row" style="width: 100%">
            <div class="col-md-6">
                <div class="white-box-auto">
                    <h1 class="primary text-center">@lang('Say HELLO to me!')</h1>
                    <form class="" action="" method="POST">
                        <div class="input-group input-group-seamless dg-input mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <input type="text" name="sender_email" id="sender_email" class="form-control py-3" placeholder="@lang('Your Email Address')">
                        </div>
                        <div class="input-group input-group-seamless dg-input mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <input type="text" name="sender_name" id="sender_name" class="form-control py-3" placeholder="@lang('Your Full Name')">
                        </div>
                        <div class="input-group input-group-seamless dg-input mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text top">
                                    <i class="fas fa-comment-alt"></i>
                                </div>
                            </div>
                            <textarea class="form-control" rows="5" name="msg" id="msg" placeholder="@lang('Your Message')"></textarea>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn main-button px-5" >@lang('Send')</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 text-center part-2">
                <h1 class="primary mt-3">@lang('Get me on socials')</h1>
                <div class="row social-row">
                    <div class="col-4 py-2 mx-0 px-0 d-flex justify-content-center">
                        <div class="social"><a href="#"><i class="fab fa-facebook-messenger"></i></a></div>
                    </div>
                    <div class="col-4 py-2 mx-0 px-0 d-flex justify-content-center">
                        <div class="social"><a href="#"><i class="fab fa-facebook-f"></i></a></div>
                    </div>
                    <div class="col-4 py-2 mx-0 px-0 d-flex justify-content-center">
                        <div class="social"><a href="#"><i class="fab fa-twitter"></i></a></div>
                    </div>
                    <div class="col-4 py-2 mx-0 px-0 d-flex justify-content-center">
                        <div class="social"><a href="#"><i class="fab fa-github"></i></a></div>
                    </div>
                    <div class="col-4 py-2 mx-0 px-0 d-flex justify-content-center">
                        <div class="social"><a href="#"><i class="fab fa-linkedin"></i></a></div>
                    </div>
                    <div class="col-4 py-2 mx-0 px-0 d-flex justify-content-center">
                        <div class="social"><a href="#"><i class="fab fa-instagram"></i></a></div>
                    </div>
                </div>
                <p class="copyright">Copyright &copy; {{date('Y')}} &bull; Website.com</p>
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
        });
    </script>
@endsection