@php 
    use App\Models\System\Configuration;
    use App\Models\Utils\Loader;

    $loader = Loader::find(Configuration::get('selected_loader'));
@endphp

<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/shards-ui/3.0.0/css/shards.min.css">
        
        @yield('css')

        <title>@yield('title')</title>

        @include('web.styles.css')
        @include('web.styles.preloader')
        
        @yield('style')
    </head>
    <body>
        <div id="preloader">
            {!!$loader->html!!}
        </div>
        @yield('content')
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js" type="text/javascript"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/shards-ui/3.0.0/js/shards.min.js"></script>
    @include('sweetalert::alert')
    @yield('js')
    <script>
        $(window).on('load',function(){ $('#preloader').slideUp(); });
    </script>
    @yield('scripts')
</html>

@if($errors->any())
    @foreach($errors->all() as $err)
    <script>swalToast('error',"{{$err}}")</script>
    @endforeach
@endif