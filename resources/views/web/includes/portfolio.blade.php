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
            <li class="active">@lang('Intro')</li>
            <li>@lang('Services')</li>
            <li>@lang('Projects')</li>
            <li>@lang('Resume')</li>
            <li>@lang('Get in touch')</li>
        </ul>
    </div>
</div> 

@section('scripts')
    @parent 
    <script>
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

        function change(text) {
            $('#title-array').fadeOut(() => {
                $('#title-array').html(text).fadeIn();
            });
        }
    </script>
@stop