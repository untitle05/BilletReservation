@extends('layout.inside')

@section('content')
<button class="ui primary button" id="add" style="position:relative; right: -850px; top: -50px;">
    Ajouter un destination
</button>

<div class="header" style="position:relative; top: -20px;">
    <h3>Liste des destinations</h3>
    <div class="ui divider"></div>
</div>

<table class="ui celled table" style="width:50%; margin:auto;">
    <thead>
        <tr>
            <th>Nom de la destination </th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($destinations as $destination)
        <tr id="destination{{$destination->id}}">
            <td>{{ $destination->destination_name}}</td>
            <td>
                <button class="ui primary basic button edit" data-id="{{ $destination->id}}"
                    title="Modifier les informations du véhicule">Editer</button>
                <button class="ui negative basic button delete" data-id="{{ $destination->id}}"
                    title="Supprimer les informations du véhicule">Supprimer</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('modal_content')
<div class="ui modal add_destination" style="width:30%;">
    <i class="close icon"></i>
    <div class="header">Information sur la destination</div>
    <div class="content">
        <form class="ui form" id="insert_form">
            <div class="field">
                <label>Nom de la destination</label>
                <input type="text" name="destination_name" id="destination_name">
            </div>

            <button class="ui button rigth primary" id="save" type="submit">OK</button>
        </form>
    </div>
</div>

<div class="ui modal update_destination" style="width:30%;">
    <i class="close icon"></i>
    <div class="header">Modification de la destination</div>
    <div class="content">
        <form class="ui form" id="update_form" action="updateDestination">
            {{ csrf_field() }}
            <input type="hidden" id="update_id" name="id">

            <div class="field">
                <label>Nom de la destination</label>
                <input type="text" name="destination_name" id="update_destination_name">
            </div>
            <div class="actions">
                <button class="ui violet basic button close" id="modifier" type="submit">Modifier</button>
            </div>
        </form>

    </div>
    @stop

    @section('script')
    <script>
        $(document).ready(function(){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
       });

       $('#add').on('click', function(){
           console.log('hello');
           $('.add_destination').modal('show');
           $('#insert_form').trigger('reset');
       })

       $('#insert_form').on('submit', function(e){
            e.preventDefault();

            var url = "{{ route('destination.store') }}",
            data = $('#insert_form').serialize(),
            type = 'POST';

            if($('#destination_name').val()==''){
                alert('Le nom de la destination est requis');
            }else {
                $.ajax({
                    type:type,
                    url:url,
                    data:data,
                    success:function(data){
                        console.log('hi');
                    $('#insert_form').trigger('reset');
                    var row = '<tr id="destination'+ data.id+'" >' +
                              '<td>' + data.destination_name + '</td>' +
                              '<td>  ' +
                              '<button class="ui primary basic button edit" data-id="' + data.id + '" title="Modifier les informations de la destination">Editer</button> ' +
                              '<button class="ui negative basic button delete" data-id="' + data.id + '"title="Supprimer les informations de la destination">Supprimer</button>'+
                              '</td>' +
                              '</tr>';
                              $('tbody').prepend(row);
                              refreshEditModal();
                              refreshDeleteModal();
                    }
                });
            }
       });

       $('.edit').on('click', function(e){
        e.preventDefault();
        var value = $(this).data('id'),
            url = "{{ route('editDestination') }}";
        // console.log(url);

        $.ajax({
            type: 'post',
            url : url,
            data:{'id':value},
            success:function (data) {
                console.log(data);
                $('#update_id').val(data.id);
                $('#update_destination_name').val(data.destination_name);
                $('.update_destination').modal('show');
        }
    });

});

$('#update_form').on('submit', function(e){
                    e.preventDefault();
                    // let id = /voirImprimante?id='+imprimante_id;
                    let url = $('#update_form').attr('action'),
                    data = $('#update_form').serialize(),
                    type = 'PUT';
                    $.ajax({
                        type: type,
                        url: url,
                        data: data,
                        success:function(data){
                            console.log(data)
                            var row = '<tr id="destination'+ data.id+'" >' +
                            '<td>' + data.destination_name + '</td>' +
                            '<td>  ' +
                            '<button class="ui primary basic button edit" data-id="' + data.id + '" title="Modifier les informations de l\'destination">Editer</button> ' +
                            '<button class="ui negative basic button delete" data-id="' + data.id + '"title="Supprimer les informations de l\'destination">Supprimer</button>'+
                            '</td>' +
                            '</tr>';
                            $('#destination'+ data.id).replaceWith(row);
                            $('.update_destination').modal('hide');
                            refreshEditModal();
                            refreshDeleteModal();
                            
                        }
                    });
});

function refreshEditModal(){
    $('.edit').on('click', function(e){
        e.preventDefault();
        var value = $(this).data('id'),
            url = "{{ route('editDestination') }}";
        // console.log(url);

        $.ajax({
            type: 'post',
            url : url,
            data:{'id':value},
            success:function (data) {
                console.log(data);
                $('#update_id').val(data.id)
                $('#update_destination_name').val(data.destination_name)
                $('.update_destination').modal('show');
        }
    });

});
}



 $('.delete').on('click', function(e){
     e.preventDefault();
     let value = $(this).data('id'),
     url = '{{route("destinationDestroy")}}';
     if(confirm("etes vous sure de vouloir supprimer cet destination?")==true){
         $.ajax({
             type:'delete',
             url: url,
             data:{'id':value},
             success:function(){
                 $('#destination'+value).remove();
             }
         });

     }
 });

 
 function refreshDeleteModal(){
    $('.delete').on('click', function(e){
     e.preventDefault();
     let value = $(this).data('id'),
     url = '{{route("destinationDestroy")}}';
     if(confirm("etes vous sure de vouloir supprimer cet destination?")==true){
         $.ajax({
             type:'delete',
             url: url,
             data:{'id':value},
             success:function(){
                 $('#destination'+value).remove();
             }
         });

     }
 });
 }
    </script>
    @endsection