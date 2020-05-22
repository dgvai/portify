@extends('adminlte::page')
@section('title', __('App Settings'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <x-dg-card bg="primary" title="Application Configurations">
                <form class="row" action="{{route('set.config')}}" method="POST">
                    @csrf
                    <div class="col-md-4">
                        <x-dg-card bg="dark" outline="true" title="Runtime" collapsed="true"> 
                            <x-dg-input id="APP_NAME" name="APP_NAME" label="Application Name" :value="config('app.name')" />
                            <x-dg-select2 id="APP_DEBUG" name="APP_DEBUG" label="Debug Mode">
                                <x-dg-option value="true" :selected="config('app.debug') ? 'true' : ''">Enable</x-dg-option>
                                <x-dg-option value="false" :selected="config('app.debug') ? '' : 'true'">Disable</x-dg-option>
                            </x-dg-select2>
                            <x-dg-select2 id="APP_TIMEZONE" name="APP_TIMEZONE" label="Timezone">
                                @foreach($tzs as $tz)
                                <x-dg-option :value="$tz->key" :selected="config('app.timezone') == $tz->key ? 'true' : ''">{{$tz->value}}</x-dg-option>
                                @endforeach
                            </x-dg-select2>
                            <x-dg-select2 id="RCV_MAIL" name="RCV_MAIL" label="Receive Email Notifications">
                                <x-dg-option value="true" :selected="config('app.emailer') ? 'true' : ''">Enable</x-dg-option>
                                <x-dg-option value="false" :selected="config('app.emailer') ? '' : 'true'">Disable</x-dg-option>
                            </x-dg-select2>
                        </x-dg-card>
                    </div>
                    <div class="col-md-4">
                        <x-dg-card bg="warning" outline="true" title="Database" collapsed="true"> 
                            <x-dg-input id="DB_HOST" name="DB_HOST" label="DB Host" :value="readEnv('DB_HOST')" />
                            <x-dg-input id="DB_DATABASE" name="DB_DATABASE" label="DB Name" :value="readEnv('DB_DATABASE')" />
                            <x-dg-input id="DB_USERNAME" name="DB_USERNAME" label="DB User" :value="readEnv('DB_USERNAME')" />
                            <x-dg-input id="DB_PASSWORD" name="DB_PASSWORD" label="DB Password" :value="readEnv('DB_PASSWORD')" />
                        </x-dg-card>
                    </div>
                    <div class="col-md-4">
                        <x-dg-card bg="danger" outline="true" title="SMTP" collapsed="true"> 
                            <x-dg-input id="MAIL_HOST" name="MAIL_HOST" label="SMTP Host" :value="readEnv('MAIL_HOST')" />
                            <x-dg-input id="MAIL_PORT" name="MAIL_PORT" label="SMTP Port" :value="readEnv('MAIL_PORT')" />
                            <x-dg-input id="MAIL_USERNAME" name="MAIL_USERNAME" label="SMTP User" :value="readEnv('MAIL_USERNAME')" />
                            <x-dg-input id="MAIL_PASSWORD" name="MAIL_PASSWORD" label="SMTP Password" :value="readEnv('MAIL_PASSWORD')" />
                        </x-dg-card>
                    </div>
                    <div class="col-md-4">
                        <x-dg-card bg="success" outline="true" title="Swift Variables" collapsed="true"> 
                            <x-dg-input id="DB_PORT" name="DB_PORT" label="DB port" :value="readEnv('DB_PORT')" />
                            <x-dg-input id="MAIL_ENCRYPTION" name="MAIL_ENCRYPTION" label="Mail Encryption" :value="readEnv('MAIL_ENCRYPTION')" />
                            <x-dg-input id="MAIL_FROM_ADDRESS" name="MAIL_FROM_ADDRESS" label="Mail From Address" :value="readEnv('MAIL_FROM_ADDRESS')" />
                            <x-dg-input id="MAIL_FROM_NAME" name="MAIL_FROM_NAME" label="Mail From Name" :value="readEnv('MAIL_FROM_NAME')" />
                        </x-dg-card>
                    </div>
                    <div class="col-md-12">
                        <x-dg-submit label="Save Changes" inputclass="px-5" />
                    </div>
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