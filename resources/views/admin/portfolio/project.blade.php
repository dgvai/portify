@extends('adminlte::page')
@section('title', __('My Projects'))

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div data-toggle="modal" data-target="#project-plate" data-type="create">
            <x-dg-info-box title="Add New" bg="primary" text="Project" icon="fas fa-plus" :full="true" />
            </div>
        </div>
        <div class="col-md-3">
            <x-dg-info-box :title="__('Total Projects')" :text="$user->projects->count()" icon="fas fa-paper-plane" bg="primary" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <x-dg-card :title="__('My Projects')" bg="primary">
                <x-dg-datatable id="project_table" :heads="['#','Thumbnail','Title', 'Description', 'Actions']"/>
            </x-dg-card>
        </div>
    </div>

    <x-dg-modal id="project-plate" title="Project">
        <form id="project-form" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="dgid" name="id">
            <x-dg-input id="title" name="title" :label="__('Project Title')" :placeholder="__('Enter your project name')" :required="true" />
            <x-dg-input-file id="image" name="image" :label="__('Project Image').' (3:2)'" :placeholder="__('Choose image file to upload/change')" />
            <x-dg-textarea id="description" name="description" :label="__('Project Description')" :placeholder="__('Enter your project description')" :required="true" rows="5"></x-dg-textarea>
            <x-dg-input id="link" name="link" :label="__('Project Url')" placeholder="https://..." :required="true" />
            <x-dg-submit label="Save" />
        </form>
    </x-dg-modal>
@stop

@section('js')
@include('sweetalert::alert')
    <script>
        $(()=>{
            let project_table = $('#project_table').DataTable({
                ajax: {
                    url: "{{route('get.projects')}}",
                    type: 'GET',
                    dataSrc: function (json) {
                        data = json.data;
                        let embed_data = new Array();
                        for (let i = 0; i < data.length; i++) {
                            embed_data.push({
                                id : data[i].id,
                                sl : i+1,
                                thumbnail : `<img src="${data[i].image_url}" class="img-fluid" width="100px"/>`,
                                title : data[i].title,
                                desc : data[i].description.substring(0,100)+'...',
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
                    {data: 'sl'},
                    {data: 'thumbnail'},
                    {data: 'title'},
                    {data: 'desc'},
                    {data: 'btns'},
                ],
                order: [],
                autoWidth: false,
            });

            $('#project-plate').on('show.bs.modal',function(e){
                if(e.hasOwnProperty('relatedTarget') && e.relatedTarget.dataset.type == 'create') {
                    $('#project-form').attr('action',"{{route('portfolio.add.project')}}");
                } else {
                    $('#project-form').attr('action',"{{route('portfolio.update.project')}}");
                }
            });

            $('#project-plate').on('hidden.bs.modal',function(e){
                $('#project-form').trigger('reset');
            });

            $('#project_table tbody').on('click','.edit',function(){
                id = project_table.row($(this).parents('tr')).data().id;
                $.get("{{route('get.project')}}",{id:id},function(r){
                    $('#dgid').val(id);
                    $('#title').val(r.data.title);
                    $('#description').val(r.data.description);
                    $('#link').val(r.data.link);
                    $('#project-plate').modal('show');
                });
            });

            $('#project_table tbody').on('click','.delete',function(){
                id = project_table.row($(this).parents('tr')).data().id;
                swalConfirm(function(){
                    $.post("{{route('portfolio.delete.project')}}",{id:id, _token:'{{csrf_token()}}'},function(r){
                        if(r.success) {
                            project_table.ajax.reload();
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