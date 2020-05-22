@php 
use App\Models\System\Configuration;
@endphp
@extends('adminlte::page')
@section('title', __('Site Settings'))

@section('css')
    <style>
        .bg-pats, .load-gif { mix-blend-mode: luminosity; padding: 0.5rem; height: 150px; object-fit: cover; transition: all 0.5s; } .bg-pats.active, .load-gif.active { border: var(--blue) 5px solid; } .bg-pats:hover, .load-gif:hover { padding: 1rem; }
    </style>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <x-dg-card bg="primary" :title="__('Add Social Links')">
                <form action="{{route('add.social')}}" method="POST">
                    @csrf 
                    <x-dg-input name="name" :label="__('Social Name')" placeholder="Eg. Facebook, Twitter, etc" required="true" />
                    <x-dg-select-icon id="icon" name="icon" :required="true" :label="__('Social Icon')">
                        @foreach($icons as $icon)
                        @php 
                        if(explode(' ',$icon->text)[0] != 'fab') {
                            continue;
                        }
                        @endphp
                        <x-dg-option value="{{$icon->text}}" icon="true" content="{{$icon->text}}"> {{explode(' ',$icon->text)[1]}} </x-dg-option>
                        @endforeach
                    </x-dg-select-icon>
                    <x-dg-input name="url" :label="__('Social Url')" placeholder="https://..." required="true" />
                    <x-dg-submit label="Add"/>
                </form>
                <button class="btn btn-secondary btn-block mt-3" data-toggle="modal" data-target="#social-links">@lang('Edit Links')</button>
            </x-dg-card>
        </div>
        <div class="col-md-6">
            <x-dg-card bg="primary" :title="__('Change Primary Settings')">
                <form action="{{route('save.setting')}}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <x-dg-input-color name="primary" id="primary-color" :value="Configuration::get('primary_color')" :label="__('Choose Color')" required="true"/>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend mr-2">
                            <span class="input-group-text" id="basic-addon1">
                                <img src="{{asset('favicons/favicon.ico?'.time())}}" class="img-responsive" width="32px" />
                            </span>
                        </div>
                        <x-dg-input-file id="favicon" name="favicon" :label="__('Change Favicon')" placeholder="Upload ico - 64x64" />
                    </div>
                
                    <x-dg-select2 id="font-fam" name="font_family" :label="__('Select Font Family')">
                        <x-dg-option value="Montserrat" :selected="Configuration::get('font_family') == 'Montserrat' ? true : false">Montserrat</x-dg-option>
                        <x-dg-option value="Montserrat+Alternates" :selected="Configuration::get('font_family') == 'Montserrat+Alternates' ? true : false">Montserrat Alternates</x-dg-option>
                        <x-dg-option value="Ubuntu" :selected="Configuration::get('font_family') == 'Ubuntu' ? true : false">Ubuntu</x-dg-option>
                        <x-dg-option value="Titillium+Web" :selected="Configuration::get('font_family') == 'Titillium+Web' ? true : false">Titillium Web</x-dg-option>
                        <x-dg-option value="Rajdhani" :selected="Configuration::get('font_family') == 'Rajdhani' ? true : false">Rajdhani</x-dg-option>
                    </x-dg-select2>
                    <x-dg-submit label="Change" />
                </form>
            </x-dg-card>
        </div>
        <div class="col-md-12">
            <x-dg-card bg="primary" :title="__('Select Intro Background')">
                <div class="row" id="bgs">
                    @foreach($bgs as $bg)
                    <div class="col-md-3 text-center">
                        <img src="{{asset('storage/app/patterns/'.$bg)}}" 
                        class="img-responsive bg-pats lazy {{Configuration::get('selected_bg') == $bg ? 'active' : ''}}" 
                        width="100%"
                        data-name="{{$bg}}" />
                    </div>
                    @endforeach
                </div>
            </x-dg-card>
        </div>
        <div class="col-md-12">
            <x-dg-card bg="primary" :title="__('Select Preloader')">
                <div class="row" id="loads">
                    @foreach($loaders as $loader)
                    <div class="col-md-2">
                        <img src="{{asset('storage/app/loaders/'.$loader)}}" 
                        class="img-responsive load-gif lazy {{Configuration::get('selected_loader').'.gif' == $loader ? 'active' : ''}}" 
                        width="100%"
                        data-name="{{$loader}}" />
                    </div>
                    @endforeach
                </div>
            </x-dg-card>
        </div>
    </div>

    <x-dg-modal id="social-links" title="Social Links">
        <x-dg-datatable id="social_table" :heads="['Icon','Action']"/>
    </x-dg-modal>

    <x-dg-modal id="edit-social" title="Edit Social" index="2">
        <form action="{{route('edit.social')}}" method="POST">
            @csrf 
            <input type="hidden" name="id" id="dgid" />
            <x-dg-input id="name-2" name="name" :label="__('Social Name')" placeholder="Eg. Facebook, Twitter, etc" required="true" />
            <x-dg-select-icon id="icon-2" name="icon" :required="true" :label="__('Social Icon')">
                @foreach($icons as $icon)
                @php 
                if(explode(' ',$icon->text)[0] != 'fab') {
                    continue;
                }
                @endphp
                <x-dg-option value="{{$icon->text}}" icon="true" content="{{$icon->text}}"> {{explode(' ',$icon->text)[1]}} </x-dg-option>
                @endforeach
            </x-dg-select-icon>
            <x-dg-input id="url-2" name="url" :label="__('Social Url')" placeholder="https://..." required="true" />
            <x-dg-submit label="Add"/>
        </form>
    </x-dg-modal>
@stop

@section('js')
@include('sweetalert::alert')
    <script>
        $(()=>{
            $('.lazy').lazy();
            let social_table;
            $('#social-links').on('show.bs.modal',function(){
                social_table = $('#social_table').DataTable({
                    ajax: {
                        url: "{{route('get.socials')}}",
                        type: 'GET',
                        dataSrc: function (json) {
                            data = json.data;
                            let embed_data = new Array();
                            for (let i = 0; i < data.length; i++) {
                                embed_data.push({
                                    id : data[i].id,
                                    icon : `<i class="${data[i].icon}" ></i>`,
                                    btns : `<div class="btn-group">
                                                <button class="btn btn-info btn-sm edit" data-toggle="tooltip" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm delete" data-toggle="tooltip" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>`
                                });
                            }
                            return embed_data;
                        }
                    },
                    columns : [
                        {data: 'icon'},
                        {data: 'btns'},
                    ],
                    order: [],
                    autoWidth: false,
                });
            });

            $('#social-links').on('hidden.bs.modal',function(){
                social_table.clear().destroy();
            });

            $('#social_table tbody').on('click','.edit',function(){
                id = social_table.row($(this).parents('tr')).data().id;
                $.get("{{route('get.social')}}",{id:id},function(r){
                    $('#dgid').val(id);
                    $('#name-2').val(r.data.name);
                    $('#icon-2').val(r.data.icon);
                    $('#icon-2').trigger('change');
                    $('#url-2').val(r.data.url);
                    $('#edit-social').modal('show');
                });
            });

            $('#social_table tbody').on('click','.delete',function(){
                id = social_table.row($(this).parents('tr')).data().id;
                swalConfirm(function(){
                    $.post("{{route('delete.social')}}",{id:id, _token:'{{csrf_token()}}'},function(r){
                        if(r.success) {
                            social_table.ajax.reload();
                            swalToast('success',r.msg);
                        } else {
                            swalToast('error',r.msg);
                        }
                    });
                });
            });

            $('.bg-pats').click(function(){
                let bg = $(this).data('name');
                let img = $(this);
                $.post("{{route('set.bg')}}",{_token: '{{csrf_token()}}', bg}, function(r){
                    if(r) {
                        $('#bgs .col-md-3').children().removeClass("active");
                        img.addClass('active');
                    } else {
                        swalToast('error','Something went worng');
                    }
                });
            });

            $('.load-gif').click(function(){
                let loader = $(this).data('name');
                let img = $(this);
                $.post("{{route('set.loader')}}",{_token: '{{csrf_token()}}', loader}, function(r){
                    if(r) {
                        $('#loads .col-md-2').children().removeClass("active");
                        img.addClass('active');
                    } else {
                        swalToast('error','Something went worng');
                    }
                });
            });
        });
    </script>
@stop