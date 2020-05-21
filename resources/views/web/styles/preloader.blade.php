@php 
    use App\Models\System\Configuration;
    use App\Models\Utils\Loader;

    $loader = Loader::find(Configuration::get('selected_loader'));
@endphp

<style>
    #preloader { width: 100%; height: 100vh; position: fixed; top: 0; left: 0; z-index: 9999; display: flex; justify-content: center; align-items: center; background: var(--color-primary); }
    {!!$loader->css!!}
</style>