@extends('adminlte::page')
@section('title', __('Content Settings'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <x-dg-card bg="primary" title="Text Contents">
                <form action="{{route('save.langs')}}" method="POST">
                    @csrf 
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Original</th>
                                <th>Change</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($langs as $key=>$lang)
                            <tr>
                                <td>{{$key}}</td>
                                <td><input type="text" class="form-control" name="data[]" value="{{$lang}}"></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <x-dg-submit label="Save Changes" />
                </form>
            </x-dg-card>
        </div>
    </div>
@stop

@section('js')
@include('sweetalert::alert')
    <script>
    </script>
@stop