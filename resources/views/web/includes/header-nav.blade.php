<div id="fixed-nav" class="animated slideInDown">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="{{route('home')}}">{{$user->full_name}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li id="s-intro" class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}#intro">@lang('Intro')</a>
                </li>
                <li id="s-services" class="nav-item">
                    <a class="nav-link" href="{{route('home')}}#services">@lang('Services')</a>
                </li>
                <li id="s-skills" class="nav-item">
                    <a class="nav-link" href="{{route('home')}}#skills">@lang('Skills')</a>
                </li>
                <li id="s-projects" class="nav-item">
                    <a class="nav-link" href="{{route('home')}}#projects">@lang('Projects')</a>
                </li>
                <li id="s-gallery" class="nav-item">
                    <a class="nav-link" href="#gallery">@lang('Gallery')</a>
                </li>
                <li id="s-resume" class="nav-item">
                    <a class="nav-link" href="{{route('home')}}#resume">@lang('Resume')</a>
                </li>
                <li id="s-contact" class="nav-item">
                    <a class="nav-link" href="{{route('home')}}#contact">@lang('Get in touch')</a>
                </li>
            </ul>
        </div>
    </nav>
</div>