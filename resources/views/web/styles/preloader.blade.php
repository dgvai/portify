@php 
    use App\Models\System\Configuration;
    use App\Models\Utils\Loader;

    $loader = Loader::find(Configuration::get('selected_loader'));
@endphp

<style>
    :root {
        --color-primary : #16464D;
        --color-primary-a-5 : #16464DBF;
        --color-dark : #1a1a1a;
        --color-gray: #f2f2f2;
        --color-light: #fefefe;
        --font-family : 'Montserrat', sans-serif;
    }

    #preloader {
        width: 100%;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
        background: var(--color-primary);
    }
    
    {!!$loader->css!!}
    
</style>