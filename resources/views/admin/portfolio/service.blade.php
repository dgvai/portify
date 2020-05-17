@extends('adminlte::page')
@section('title', __('My Services'))

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-3">
            <div data-toggle="modal" data-target="#service-plate" data-type="create">
            <x-dg-info-box title="Add New" bg="primary" text="Service" icon="fas fa-plus" :full="true" />
            </div>
        </div>
        <div class="col-md-3">
            <x-dg-info-box :title="__('Total Services')" :text="$user->services->count()" icon="fas fa-star" bg="primary" />
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-dg-card bg="primary" :title="__('Services')">
                <x-dg-datatable id="services_table" :heads="['#','Icon','Title','Actions']" />
            </x-dg-card>
        </div>
    </div>

    <x-dg-modal id="service-plate" title="Service">
        <form id="service-form" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="dgid" name="id">
            <x-dg-input id="title" name="title" :label="__('Service Title')" :placeholder="__('Enter your Service name')" :required="true" />
            <x-dg-select-icon id="icon" name="icon" :required="true" :label="__('Service Icon')">
                @foreach($icons as $icon)
                <x-dg-option value="{{$icon->text}}" icon="true" content="{{$icon->text}}"> {{explode(' ',$icon->text)[1]}} </x-dg-option>
                @endforeach
            </x-dg-select-icon>
            <x-dg-textarea id="description" name="description" :label="__('Service Description')" :placeholder="__('Enter your Service description')" :required="true" rows="5"></x-dg-textarea>
            <x-dg-submit label="Save" />
        </form>
    </x-dg-modal>
@stop

@section('js')
@include('sweetalert::alert')
    <script>
        $(()=>{
            let services_table = $('#services_table').DataTable({
                ajax: {
                    url: "{{route('get.services')}}",
                    type: 'GET',
                    dataSrc: function (json) {
                        data = json.data;
                        let embed_data = new Array();
                        for (let i = 0; i < data.length; i++) {
                            embed_data.push({
                                id : data[i].id,
                                sl : i+1,
                                icon : `<i class="${data[i].icon} fa-2x"></i>`,
                                title : data[i].title,
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
                dom : 't',
                columns : [
                    {data: 'sl'},
                    {data: 'icon'},
                    {data: 'title'},
                    {data: 'btns'},
                ],
                order: [],
                autoWidth: false,
            });
            $('#service-plate').on('show.bs.modal',function(e){
                if(e.hasOwnProperty('relatedTarget') && e.relatedTarget.dataset.type == 'create') {
                    $('#service-form').attr('action',"{{route('portfolio.add.services')}}");
                } else {
                    $('#service-form').attr('action',"{{route('portfolio.update.services')}}");
                }
            });

            $('#service-plate').on('hidden.bs.modal',function(e){
                $('#service-form').trigger('reset');
            });

            $('#services_table tbody').on('click','.edit',function(){
                id = services_table.row($(this).parents('tr')).data().id;
                $.get("{{route('get.service')}}",{id:id},function(r){
                    $('#dgid').val(id);
                    $('#title').val(r.data.title);
                    $('#icon').selectpicker('val', r.data.icon);
                    $('#description').val(r.data.description);
                    $('#service-plate').modal('show');
                });
            });

            $('#services_table tbody').on('click','.delete',function(){
                id = services_table.row($(this).parents('tr')).data().id;
                swalConfirm(function(){
                    $.post("{{route('portfolio.delete.services')}}",{id:id, _token:'{{csrf_token()}}'},function(r){
                        if(r.success) {
                            services_table.ajax.reload();
                            swalToast('success',r.msg);
                        } else {
                            swalToast('error',r.msg);
                        }
                    });
                });
            });
        });

    </script>
@stop