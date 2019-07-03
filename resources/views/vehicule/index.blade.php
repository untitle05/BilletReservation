@extends('layout.inside')

@section('js')
<script src="{{ asset('semantic/message.js') }}"></script>
@stop

@section('content')
<button class="ui primary button" id="add" style="position:relative; right: -850px; top: -50px;">
    Ajouter un vehicule
</button>
<div class="header" style="position:relative; top: -20px;">
    <h3>Liste des Véhicules</h3>
    <div class="ui divider"></div>
</div>

<table class="ui celled table">
    <thead>
        <tr>
            <th>Immatriculation</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Nombre de places</th>
            <th>Vitesse Max</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($vehicules as $vehicule)
        <tr id="vehicule{{$vehicule->id}}">
            <td>{{ $vehicule->immat_vehi}}</td>
            <td>{{ $vehicule->marque_vehi}}</td>
            <td>{{ $vehicule->model}}</td>
            <td>{{ $vehicule->nbrPlace_vehi}}</td>
            <td>{{ $vehicule->vitesseMax}}</td>
            <td>
                <button class="ui primary basic button edit" data-id="{{ $vehicule->id}}"
                    title="Modifier les informations du véhicule">Editer</button>
                <button class="ui negative basic button delete" data-id="{{ $vehicule->id}}"
                    title="Supprimer les informations du véhicule">Supprimer</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop

@section('modal_content')
<div class="ui modal add_vehicule" style="width:50%;">
    <i class="close icon"></i>
    <div class="header">Informations sur le véhicule</div>
    <div class="content">
        <form class="ui form" id="insert_form">
            <div class="field">
                <label>Immatriculation du véhicule</label>
                <input type="text" name="immat_vehi" id="immat_vehi" placeholder="">
            </div>

            <div class="field">
                <label>Marque du véhicule</label>
                <input type="text" name="marque_vehi" id="marque_vehi" placeholder="">
            </div>

            <div class="field">
                <label>Modèle du véhicule</label>
                <input type="text" name="model" id="model" placeholder="">
            </div>

            <div class="field" style="width:65%;">
                <label>Nombre de places du véhicule</label>
                <input type="number" name="nbrPlace_vehi" id="nbrPlace_vehi" placeholder="">
            </div>

            <div class="field">
                <div class="four fields">
                    <div class="field" style="width:45%;">
                        <label>Vitesse Max du véhicule</label>
                        <div class="ui right labeled input">
                            <input type="text" name="vitesseMax" id="vitesseMax" placeholder="">
                            <div class="ui basic label">
                                km/h
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="ui button rigth primary" id="save" type="submit">OK</button>
        </form>
    </div>
</div>

<div class="ui modal update_vehicule" style="width:40%;">
    <i class="close icon"></i>
    <div class="header">Modification des informations du véhicule</div>
    <div class="content">
        <form class="ui form" id="update_form" action="updateVehicule">
            {{ csrf_field() }}
            <input type="hidden" id="update_id" name="id">
            <div class="field">
                <label>Immatricule du véhicule</label>
                <input type="text" name="immat_vehi" id="update_immat_vehi">
            </div>

            <div class="field">
                <label>Marque du véhicule</label>
                <input type="text" name="marque_vehi" id="update_marque_vehi">
            </div>

            <div class="field">
                <label>Modèle du véhicule</label>
                <input type="text" name="model" id="update_model">
            </div>

            <div class="field"><label>Nombre de places du véhicule</label>
                
                <input type="text" name="nbrPlace_vehi" id="update_nbrPlace_vehi">
            </div>

            <div class="field">
                <div class="four fields">
                    <div class="field" style="width:45%;">
                        <label>Vitesse Max du véhicule</label>
                        <div class="ui right labeled input">
                            <input type="text" name="vitesseMax" id="update_vitesseMax" style="width:35%;">
                            <div class="ui basic label">
                                km/h
                            </div>
                        </div>
                    </div>
                </div>
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
//----------------------------------show modal insert form---------------------------------------
       $('#add').on('click', function(){
           console.log('hello');
           $('.add_vehicule').modal('show');
           $('#insert_form').trigger('reset');
       })

//-------------------------------------insert vehicule data informations-----------------------------------

$('#insert_form').on('submit', function(e){
    e.preventDefault();

    var url = "{{ route('vehicule.store') }}",
    data = $('#insert_form').serialize(),
    type = 'POST';

    if($('#immat_vehi').val()=='')
        {
            alert("L'immatriculation du vehicule est requise");
        } else if($('#marque_vehi').val()==''){
            alert('La marque du véhicule est requise');
        } else if($('#model').val()==''){
            alert('Le modele du vehicule est requise');
        }else if($('#nbrPlace_vehi').val()==''){
            alert('Le nombre de place du vehicule est requise');
        }else if($('#vitesseMax').val()==''){
            alert('La vitesse Max du vehicule est requise');
        }else {
            $.ajax({
                type:type,
                url:url,
                data:data,
                success:function(data){
                    console.log(data);
                    $('#insert_form').trigger('reset');
                    var row = '<tr id="vehicule'+ data.id+'" >' +
                            '<td>' + data.immat_vehi + '</td>' +
                            '<td>' + data.marque_vehi + '</td>' +
                            '<td>' + data.model + '</td>' +
                            '<td>' + data.nbrPlace_vehi + '</td>' +
                            '<td>' + data.vitesseMax + '</td>' +
                            '<td>  ' +
                            '<button class="ui primary basic button edit" data-id="' + data.id + '" title="Modifier les informations du véhicule">Editer</button> ' +
                            '<button class="ui negative basic button delete" data-id="' + data.id + '"title="Supprimer les informations du véhicule">Supprimer</button>'+
                            '</td>' +
                            '</tr>';
                            $('tbody').prepend(row);
                            refreshModal();

                }
            });
        }

});


function refreshModal(){
    $('.edit').on('click', function(e){
    e.preventDefault();
    var value = $(this).data('id'),
        url = "{{ route('editVehi') }}";
    // console.log(url);

    $.ajax({
        type: 'post',
        url : url,
        data:{'id':value},
        success:function (data) {
              console.log(data);
              $('#update_id').val(data.id)
              $('#update_immat_vehi').val(data.immat_vehi)
              $('#update_marque_vehi').val(data.marque_vehi)
              $('#update_model').val(data.model)
              $('#update_nbrPlace_vehi').val(data.nbrPlace_vehi)
              $('#update_vitesseMax').val(data.vitesseMax)
              $('.update_vehicule').modal('show');

        }
    });

});
}

//----------------------show edit modal form-------------------------------------------
$('.edit').on('click', function(e){
    e.preventDefault();
    var value = $(this).data('id'),
        url = "{{ route('editVehi') }}";
    // console.log(url);

    $.ajax({
        type: 'post',
        url : url,
        data:{'id':value},
        success:function (data) {
              console.log(data);
              $('#update_id').val(data.id)
              $('#update_immat_vehi').val(data.immat_vehi)
              $('#update_marque_vehi').val(data.marque_vehi)
              $('#update_model').val(data.model)
              $('#update_nbrPlace_vehi').val(data.nbrPlace_vehi)
              $('#update_vitesseMax').val(data.vitesseMax)
              $('.update_vehicule').modal('show');

        }
    });

});

//---------------------------update vehicules informations--------------------------------------
$('#update_form').on('submit', function(e){
                    e.preventDefault();
                    // let id = /voirImprimante?id='+imprimante_id;
                    let url = $('#update_form').attr('action'),
                    data = $('#update_form').serialize();
                    let type = 'PUT';
                    $.ajax({
                        type: type,
                        url: url,
                        data: data,
                        success:function(data){
                            console.log(data)
                            var row = '<tr id="vehicule'+ data.id+'" >' +
                            '<td>' + data.immat_vehi + '</td>' +
                            '<td>' + data.marque_vehi + '</td>' +
                            '<td>' + data.model + '</td>' +
                            '<td>' + data.nbrPlace_vehi + '</td>' +
                            '<td>' + data.vitesseMax + '</td>' +
                            '<td>  ' +
                            '<button class="ui primary basic button edit" data-id="' + data.id + '" title="Modifier les informations du véhicule">Editer</button> ' +
                            '<button class="ui negative basic button delete" data-id="' + data.id + '"title="Supprimer les informations du véhicule">Supprimer</button>'+
                            '</td>' +
                            '</tr>';

                            $('#vehicule'+ data.id).replaceWith(row);
                                $('.update_vehicule').modal('hide');
                                          refreshModal();

                        },
                        
        });
});



//------------------------------delete vehicule information data---------------------------------------
$('.delete').on('click',function () {

console.log('hi');
var value= $(this).data('id');
var url = '{{ route("destroy") }}';
if(confirm("etez vous sure de vouloir supprimer ce vehicule")==true){

    $.ajax({type : 'DELETE',  url : url, data : {'id':value}, success:function () {
        $('#vehicule'+value).remove();

    }
    });
}

});
    </script>
    @endsection