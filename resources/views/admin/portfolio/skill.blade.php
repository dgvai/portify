@extends('adminlte::page')
@section('title', __('My Skills'))

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-3">
            <div data-toggle="modal" data-target="#skill-plate" data-type="create">
            <x-dg-info-box title="Add New" bg="primary" text="Skill" icon="fas fa-plus" :full="true" />
            </div>
        </div>
        <div class="col-md-3">
            <x-dg-info-box :title="__('Total Skills')" :text="$user->skills->count()" icon="fas fa-percent" bg="primary" />
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-dg-card bg="primary" :title="__('Skills')">
                <x-dg-datatable id="skills_table" :heads="['#','Skill','Percent','Actions']" />
            </x-dg-card>
        </div>
    </div>

    <x-dg-modal id="skill-plate" title="Skill">
        <form id="skill-form" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="dgid" name="id">
            <x-dg-input id="name" name="name" :label="__('Skill Name')" :placeholder="__('Enter your Skill name')" :required="true" />
            <x-dg-input-slider id="percent" name="percent" label="Skill Percentage" :required="true" />
            <x-dg-submit label="Save" />
        </form>
    </x-dg-modal>
@stop

@section('js')
@include('sweetalert::alert')
    <script>
        $(()=>{
            let skills_table = $('#skills_table').DataTable({
                ajax: {
                    url: "{{route('get.skills')}}",
                    type: 'GET',
                    dataSrc: function (json) {
                        data = json.data;
                        let embed_data = new Array();
                        for (let i = 0; i < data.length; i++) {
                            embed_data.push({
                                id : data[i].id,
                                sl : i+1,
                                name : data[i].name,
                                percent : data[i].percent,
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
                    {data: 'name'},
                    {data: 'percent'},
                    {data: 'btns'},
                ],
                order: [],
                autoWidth: false,
            });
            $('#skill-plate').on('show.bs.modal',function(e){
                if(e.hasOwnProperty('relatedTarget') && e.relatedTarget.dataset.type == 'create') {
                    $('#skill-form').attr('action',"{{route('portfolio.add.skill')}}");
                } else {
                    $('#skill-form').attr('action',"{{route('portfolio.update.skill')}}");
                }
            });

            $('#skill-plate').on('hidden.bs.modal',function(e){
                $('#skill-form').trigger('reset');
            });

            $('#skills_table tbody').on('click','.edit',function(){
                id = skills_table.row($(this).parents('tr')).data().id;
                $.get("{{route('get.skill')}}",{id:id},function(r){
                    $('#dgid').val(id);
                    $('#name').val(r.data.name);
                    $('#percent').bootstrapSlider('setValue', r.data.percent);
                    $('#skill-plate').modal('show');
                });
            });

            $('#skills_table tbody').on('click','.delete',function(){
                id = skills_table.row($(this).parents('tr')).data().id;
                swalConfirm(function(){
                    $.post("{{route('portfolio.delete.skill')}}",{id:id, _token:'{{csrf_token()}}'},function(r){
                        if(r.success) {
                            skills_table.ajax.reload();
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