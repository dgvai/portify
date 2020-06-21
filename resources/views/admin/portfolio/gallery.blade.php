@extends('adminlte::page')
@section('title', __('Photo Gallery'))

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-3">
            <div data-toggle="modal" data-target="#gallery-plate" data-type="create">
            <x-dg-info-box title="Add New" bg="primary" text="Photo" icon="fas fa-plus" :full="true" />
            </div>
        </div>
        <div class="col-md-3">
            <x-dg-info-box :title="__('Total Photos')" :text="$user->galleries->count()" icon="fas fa-percent" bg="primary" />
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-dg-card bg="primary" :title="__('Gallery')">
                <x-dg-datatable id="gals_table" :heads="['#','Image','Caption','Actions']" />
            </x-dg-card>
        </div>
    </div>

    <x-dg-modal id="gallery-plate" title="Photo">
        <form id="gal-form" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="dgid" name="id">
            <x-dg-input-file id="image" name="image" :label="__('Photo')" :placeholder="__('Choose image file to upload/change')" />
            <x-dg-input id="caption" name="caption" :label="__('Caption')" :placeholder="__('Enter photo caption')" :required="true" />
            <x-dg-submit label="Save" />
        </form>
    </x-dg-modal>
@stop

@section('js')
@include('sweetalert::alert')
    <script>
        $(()=>{
            let gals_table = $('#gals_table').DataTable({
                ajax: {
                    url: "{{route('get.photos')}}",
                    type: 'GET',
                    dataSrc: function (json) {
                        data = json.data;
                        let embed_data = new Array();
                        for (let i = 0; i < data.length; i++) {
                            embed_data.push({
                                id : data[i].id,
                                sl : i+1,
                                caption : data[i].caption,
                                photo : `<img src="${data[i].image_url}" class="img-responsive" width="100px"/>`,
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
                    {data: 'photo'},
                    {data: 'caption'},
                    {data: 'btns'},
                ],
                order: [],
                autoWidth: false,
            });
            $('#gallery-plate').on('show.bs.modal',function(e){
                if(e.hasOwnProperty('relatedTarget') && e.relatedTarget.dataset.type == 'create') {
                    $('#gal-form').attr('action',"{{route('portfolio.add.gallery')}}");
                } else {
                    $('#gal-form').attr('action',"{{route('portfolio.update.gallery')}}");
                }
            });

            $('#gallery-plate').on('hidden.bs.modal',function(e){
                $('#gal-form').trigger('reset');
            });

            $('#gals_table tbody').on('click','.edit',function(){
                id = gals_table.row($(this).parents('tr')).data().id;
                $.get("{{route('get.photo')}}",{id:id},function(r){
                    $('#dgid').val(id);
                    $('#caption').val(r.data.caption);
                    $('#gallery-plate').modal('show');
                });
            });

            $('#gals_table tbody').on('click','.delete',function(){
                id = gals_table.row($(this).parents('tr')).data().id;
                swalConfirm(function(){
                    $.post("{{route('portfolio.delete.gallery')}}",{id:id, _token:'{{csrf_token()}}'},function(r){
                        if(r.success) {
                            gals_table.ajax.reload();
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