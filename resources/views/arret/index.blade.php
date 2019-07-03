{{-- {{ dd($destinations)}} --}}

@extends('layout.inside')

@section('content')
@if(session()->has('store'))
<div class="ui success message">
    <i class="close icon"></i>
    <div class="header">{!! session('store') !!}</div>
</div>
@endif @if(session()->has('delete'))
<div class="ui success message">
    <i class="close icon"></i>
    <div class="header">{!! session('delete') !!}</div>
</div>
@endif @if(session()->has('update'))
<div class="ui success message">
    <i class="close icon"></i>
    <div class="header">{!! session('update') !!}</div>
</div>
@endif
{{-- <button class="ui green button" id="add" style="position:relative; right: -850px; top: -50px;">
    Ajouter un arret
</button> --}}
{!! link_to_route('arret.create', 'Ajouter un arret', [], ['class' => 'ui green button', 'style' =>"position:relative;
right: -850px; top: -50px;" ]) !!}

<div class="header" style="position:relative; top: -20px;">
    <h3>Liste des arrets par destination</h3>
    <div class="ui divider"></div>
</div>

<table class="ui celled table" style="width:50%; margin:auto;" id="ajax-content">
    <thead>
        <tr>
            <th>Nom de la destination </th>
            <th>Arrets/estination </th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($destinationArrets as $destinationArret)
        @foreach($destinationArret->arrets as $key=>$arret)
        <tr>
            @if($key==0)
            <td id="destinationArret{{$destinationArret->id}}" rowspan="{{ $destinationArret->arrets->count() }}">
                {{ $destinationArret->destination_name }}</td>
            @endif
            <td class="arret{{$arret->id}}" style="border-left:1px solid #cce2ff;">
                {{ $arret->nom_arret }}</td>

            <td class="arret{{$arret->id}}">
                <a href="{{ action('ArretController@edit', ['id' => $arret->id]) }}" class="circular ui icon button"
                    title="Editer"><i class="edit icon"></i></a>
                <a id="voir-arret" title="Voir" data-id="{{ $arret->id }}" data-target="voir_arret"
                    class="circular ui icon button"><i class="eye icon"></i></a>
                <a href="#" data-id="{{$arret->id}}" id="delete-arret" class="circular ui negative  icon button"
                    data-target="supprimer_arret" title="Spprimer"><i class="eraser icon"></i></a>
            </td>
        </tr>
        @endforeach
        @endforeach

    </tbody>
</table>
@stop

@section('modal_content')
{{-- <div class="ui modal add_destination" style="width:30%;">
    <i class="close icon"></i>
    <div class="header">Information sur l'arret</div>
    <div class="content">
        <form class="ui form" id="insert_form">
            <div class="field">
                <label for="destination_id">Destination</label>
                <select class="ui fluid search dropdown" style="width:100%" name="destination_id" id="destination_id">
                    <option value="">Choisir la destination de destination</option>
                    @foreach($destinations as $destination)
                    <option value="{{ $destination->id }}">{{ $destination->destination_name}}</option>
@endforeach
</select>
</div>
<div class="field">
    <label>Nom de l'arret</label>
    <input type="text" name="nom_arret" id="nom_arret">
</div>


<button class="ui button rigth primary" id="save" type="submit">OK</button>
</form>
</div>
</div> --}}
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


    $('#add').on('click', function(){
           console.log('hello');
           $('.add_destination').modal('show');
           $('#insert_form').trigger('reset');
       })

       $('#insert_form').on('submit', function(e){
           e.preventDefault();
           let url = "{{ route('arret.store')}}",
           data = $(this).serialize(),
           type = 'POST';
        //    alert(data);
            if($('#nom_arret').val()==''){
                alert('Le Nom de l\'arret est requis');
            }else if($('#destination_id').val()==''){
                alert('le choix d\'une destination est requis');
            }else{
                $.ajax({
                    type: type,
                    url: url,
                    data: data,
                    success:function(data){
                        console.log(data);
                    }
                });
            }

            });

            $(".draggable").draggable({
        revert:true,
        containment: 'container'
    });
</script>
@stop