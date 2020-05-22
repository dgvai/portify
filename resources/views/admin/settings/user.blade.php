@extends('adminlte::page')
@section('title', __('User Settings'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-dg-card bg="primary" title="Change User Information">
                <form action="{{route('set.user')}}" method="POST">
                    @csrf 
                    <x-dg-input name="email" label="Your Email Address" :value="$user->email" :required="true" />
                    <x-dg-input type="password" name="password" label="New Password" placeholder="Fill it only if you want to change" />
                    <x-dg-input type="password" name="password_confirm" label="Confirm Password" />
                    <x-dg-submit label="Save Changes" inputclass="mx-5" />
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