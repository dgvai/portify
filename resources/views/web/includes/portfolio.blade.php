<div id="portfolio">
    <div class="container holder">
        <div class="d-flex flex-column align-items-center p-5">
            <div>
                <div class="up font-lighter">@lang('it\'s')</div>
                <div class="name">
                    <span class="font-lighter">{{$user->data->first_name}}</span>
                    <span>{{$user->data->last_name}}</span>
                </div>
                <div class="title text-right font-lighter">
                    <span id="title-array" data-titles='{!!$user->titles->pluck('title')!!}'></span>
                </div>
            </div>
        </div>
    </div>
    <div id="nav" class="containere-fluid">
        <ul class="navbar container pb-0">
            <li id="l-intro" class="active"><a href="#intro">@lang('Intro')</a></li>
            <li id="l-services"><a href="#services">@lang('Services')</a></li>
            <li id="l-projects"><a href="#projects">@lang('Projects')</a></li>
            <li id="l-resume"><a href="#resume">@lang('Resume')</a></li>
            <li id="l-contact"><a href="#contact">@lang('Get in touch')</a></li>
        </ul>
    </div>

    <div id="sticky-nav" class="animated slideInDown">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="#">{{$user->full_name}}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li id="s-intro" class="nav-item active">
                        <a class="nav-link" href="#intro">@lang('Intro')</a>
                    </li>
                    <li id="s-services" class="nav-item">
                        <a class="nav-link" href="#services">@lang('Services')</a>
                    </li>
                    <li id="s-projects" class="nav-item">
                        <a class="nav-link" href="#projects">@lang('Projects')</a>
                    </li>
                    <li id="s-resume" class="nav-item">
                        <a class="nav-link" href="#resume">@lang('Resume')</a>
                    </li>
                    <li id="s-contact" class="nav-item">
                        <a class="nav-link" href="#contact">@lang('Get in touch')</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div> 

@section('scripts')
    @parent 
    <script>
        $('#sticky-nav').hide();
        $(()=>{
            let titles = $('#title-array').data('titles');
            let i = 0;
            change(titles[i++]);
            setInterval(()=>{
                if(i == titles.length) {
                    i = 0
                }
                change(titles[i++]);
            },2000);
        });

        $(window).scroll(function(){
            if($(this).scrollTop() > $(window).height()) {
                $('#sticky-nav').removeClass('slideOutUp').addClass('slideInDown').show();
            } else {
                $('#sticky-nav').removeClass('slideInDown').addClass('slideOutUp').fadeOut(1000);
            }
        });

        function change(text) {
            $('#title-array').fadeOut(() => {
                $('#title-array').html(text).fadeIn();
            });
        }

        $('#intro').waypoint(function(){
            $("#nav ul").children().removeClass("active");
            $("#sticky-nav ul").children().removeClass("active");
            $("#l-intro").addClass("active");
            $("#s-intro").addClass("active");
        });
        $('#services').waypoint(function(){
            $("#nav ul").children().removeClass("active");
            $("#sticky-nav ul").children().removeClass("active");
            $("#l-services").addClass("active");
            $("#s-services").addClass("active");
        });
        $('#projects').waypoint(function(){
            $("#nav ul").children().removeClass("active");
            $("#sticky-nav ul").children().removeClass("active");
            $("#l-projects").addClass("active");
            $("#s-projects").addClass("active");
        });
        $('#resume').waypoint(function(){
            $("#nav ul").children().removeClass("active");
            $("#sticky-nav ul").children().removeClass("active");
            $("#l-resume").addClass("active");
            $("#s-resume").addClass("active");
        });
        $('#contact').waypoint(function(){
            $("#nav ul").children().removeClass("active");
            $("#sticky-nav ul").children().removeClass("active");
            $("#l-contact").addClass("active");
            $("#s-contact").addClass("active");
        });
    </script>
@stop