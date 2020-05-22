@extends('adminlte::page')
@section('title', __('My Inbox'))

@section('content')
    <div class="row">
        <div class="col-md-3">
            <x-dg-info-box title="New Emails" :text="$inbox->new" bg="warning" icon="fas fa-inbox" />
        </div>
        <div class="col-md-3">
            <x-dg-info-box title="All Emails" :text="$inbox->all" bg="primary" icon="fas fa-inbox" />
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <x-dg-card bg="primary" title="Inbox">
                <x-dg-date-range id="picker" inputclass="text-dark"
                callback="inbox_table.ajax.url('{{route('get.inboxes')}}/?start='+start.format('YYYY-MM-DD') + '&end=' + end.format('YYYY-MM-DD')).load();" />
                <x-dg-datatable id="inbox_table" :heads="['Date','Email','Name','Actions']" />
            </x-dg-card>
        </div>
    </div>

    <x-dg-modal id="view-msg" title="View Mail">
        <div class="d-block p-2 m-2 border rounded">
            <span class="text-bold">Sender:</span> <span id="sender"></span>
        </div>
        <p id="body" class="p-2 m-2 border rounded"></p>
    </x-dg-modal>
@stop

@section('js')
@include('sweetalert::alert')
    <script>
        let inbox_table = $('#inbox_table').DataTable({
            ajax: {
                url: "{{route('get.inboxes')}}",
                type: 'GET',
                dataSrc: function (json) {
                    data = json.data;
                    let embed_data = new Array();
                    for (let i = 0; i < data.length; i++) {
                        embed_data.push({
                            id : data[i].id,
                            sl : i+1,
                            date : moment(data[i].created_at).format('llll'),
                            email : data[i].email,
                            name : data[i].name,
                            seen : data[i].seen,
                            btns : `<div class="btn-group">
                                        <button class="btn btn-info btn-sm view" data-toggle="tooltip" title="View Mail">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <a class="btn btn-success btn-sm reply" data-toggle="tooltip" title="Reply" href="mailto:${data[i].email}">
                                            <i class="fas fa-reply"></i> 
                                        </a>
                                    </div>`
                        });
                    }
                    return embed_data;
                }
            },
            columns : [
                {data: 'date'},
                {data: 'email'},
                {data: 'name'},
                {data: 'btns'},
            ],
            order: [],
            autoWidth: false,
            createdRow: function (r, d, i) {
                if (d.seen == 0) {
                    $(r).addClass('bg-light text-bold');
                }
            }
        });

        $('#inbox_table tbody').on('click','.view',function(){
            id = inbox_table.row($(this).parents('tr')).data().id;
            $.get("{{route('get.inbox')}}",{id:id},(r) => {
                $('#dgid').val(id);
                $('#sender').text(r.data.name+` <${r.data.email}>`);
                $('#body').text(r.data.message);
                $('#view-msg').modal('show');
            });
        });

        $('#view-msg').on('hide.bs.modal',()=>{
            inbox_table.ajax.reload();
        });
    </script>
@stop