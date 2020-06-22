@extends('adminlte::page')
@section('title', __('My Titles'))

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-3">
            <div data-toggle="modal" data-target="#title-plate" data-type="create">
            <x-dg-info-box title="Add New" bg="primary" text="Title" icon="fas fa-plus" :full="true" />
            </div>
        </div>
        <div class="col-md-3">
            <x-dg-info-box :title="__('Total Titles')" :text="$user->titles->count()" icon="fas fa-star" bg="primary" />
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-dg-card bg="primary" :title="__('Titles')">
                <x-dg-datatable id="title_table" :heads="['#','Title','Actions']" />
            </x-dg-card>
        </div>
    </div>

    <x-dg-modal id="title-plate" title="Service">
        <form id="title-form" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="dgid" name="id">
            <x-dg-input id="title" name="title" :label="__('Title')" :placeholder="__('Enter a Title Text')" :required="true" />
            <x-dg-submit label="Save" />
        </form>
    </x-dg-modal>
@stop

@section('js')
@include('sweetalert::alert')
    <script>
        $(()=>{
            let title_table = $('#title_table').DataTable({
                ajax: {
                    url: "{{route('get.titles')}}",
                    type: 'GET',
                    dataSrc: function (json) {
                        data = json.data;
                        let embed_data = new Array();
                        for (let i = 0; i < data.length; i++) {
                            embed_data.push({
                                id : data[i].id,
                                sl : i+1,
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
                    {data: 'title'},
                    {data: 'btns'},
                ],
                order: [],
                autoWidth: false,
            });
            $('#title-plate').on('show.bs.modal',function(e){
                if(e.hasOwnProperty('relatedTarget') && e.relatedTarget.dataset.type == 'create') {
                    $('#title-form').attr('action',"{{route('portfolio.add.title')}}");
                } else {
                    $('#title-form').attr('action',"{{route('portfolio.update.title')}}");
                }
            });

            $('#title-plate').on('hidden.bs.modal',function(e){
                $('#title-form').trigger('reset');
            });

            $('#title_table tbody').on('click','.edit',function(){
                id = title_table.row($(this).parents('tr')).data().id;
                $.get("{{route('get.title')}}",{id:id},function(r){
                    $('#dgid').val(id);
                    $('#title').val(r.data.title);
                    $('#title-plate').modal('show');
                });
            });

            $('#title_table tbody').on('click','.delete',function(){
                id = title_table.row($(this).parents('tr')).data().id;
                swalConfirm(function(){
                    $.post("{{route('portfolio.delete.title')}}",{id:id, _token:'{{csrf_token()}}'},function(r){
                        if(r.success) {
                            title_table.ajax.reload();
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