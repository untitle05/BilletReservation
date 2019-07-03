{{-- {{ dd($voyages)}} --}}

@extends('layout.inside')

@section('content')
{!! link_to_route('voyage.create', 'creer un voyage', [], ['class' => 'ui green button', 'style' =>"position:relative;
right: -850px; top: -50px;" ]) !!}

<div class="header" style="position:relative; top: -20px;">
    <h3>Inventaire des voyages</h3>
    <div class="ui divider"></div>
</div>

<table class="ui celled table">
    <thead>
        <tr>
            <th rowspan="2">Heure de depart </th>
            <th rowspan="2">Heure d'arrivee </th>
            <th rowspan="2">Destination</th>
            <th colspan="4" style="border-left:1px solid #cce2ff;">informations sur vehicule</th>
            <th rowspan="2">Frais <br> (FCFA) </th>
        </tr>
        <tr>
            <th style="border-left:1px solid #cce2ff;">Immatriculation</th>
            <th style="border-left:1px solid #cce2ff;">Marque</th>
            <th style="border-left:1px solid #cce2ff;">Vitesse</th>
            <th style="border-left:1px solid #cce2ff;">Places disponibles</th>
        </tr>
    </thead>
    <tbody>
        @foreach($voyages as $voyage)
        <tr>
            <td id="voyage{{$voyage->id}}">
        {{ $voyage->dateDep_voy }}</td>
        <td class="voyage{{$voyage->id}}" style="border-left:1px solid #cce2ff;">
            {{ $voyage->dateArrv_voy }}</td>
        <td class="voyage{{$voyage->id}}" style="border-left:1px solid #cce2ff;">
            {{ $voyage->destination->destination_name }}</td>

        <td class="voyage{{$voyage->id}}" style="border-left:1px solid #cce2ff;">
            {{ $voyage->vehicule->immat_vehi }}</td>

        <td class="voyage{{$voyage->id}}" style="border-left:1px solid #cce2ff;">
            {{ $voyage->vehicule->marque_vehi }}</td>

        <td class="voyage{{$voyage->id}}" style="border-left:1px solid #cce2ff;">
            {{ $voyage->vehicule->vitesseMax }}</td>

        <td class="voyage{{$voyage->id}}" style="border-left:1px solid #cce2ff;">
            {{ $voyage->vehicule->nbrPlace_vehi }}</td>

        <td class="voyage{{$voyage->id}}" style="border-left:1px solid #cce2ff;">
            {{ $voyage->frais }}</td>

        {{-- <td class="voyage{{$voyage->id}}">
            <a href="{{ action('ArretController@edit', ['id' => $voyage->id]) }}" class="circular ui icon button"
                title="Editer"><i class="edit icon"></i></a>
            <a id="voir-voyage" title="Voir" data-id="{{ $voyage->id }}" data-target="voir_voyage"
                class="circular ui icon button"><i class="eye icon"></i></a>
            <a href="#" data-id="{{$voyage->id}}" id="delete-voyage" class="circular ui negative  icon button"
                data-target="supprimer_voyage" title="Spprimer"><i class="eraser icon"></i></a>
        </td> --}}
        </tr>
        @endforeach

    </tbody>
</table>
@stop


@section('script')
<script>
    semantic.validateForm = {};

// ready event
semantic.validateForm.ready = function() {
    $('select.dropdown').dropdown();
};


// attach ready event
$(document).ready(semantic.validateForm.ready);
$(document).ready(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
});


    // $('#add').on('click', function(){
    //        console.log('hello');
    //        $('.add_destination').modal('show');
    //        $('#insert_form').trigger('reset');
    //    })

    //    $('#insert_form').on('submit', function(e){
    //        e.preventDefault();
    //        let url = "{{ route('voyage.store')}}",
    //        data = $(this).serialize(),
    //        type = 'POST';
    //     //    alert(data);
    //         if($('#nom_voyage').val()==''){
    //             alert('Le Nom de l\'voyage est requis');
    //         }else if($('#destination_id').val()==''){
    //             alert('le choix d\'une destination est requis');
    //         }else{
    //             $.ajax({
    //                 type: type,
    //                 url: url,
    //                 data: data,
    //                 success:function(data){
    //                     console.log(data);
    //                 }
    //             });
    //         }

    //         });

    //         $(".draggable").draggable({
    //     revert:true,
    //     containment: 'container'
    // });
</script>
@stop