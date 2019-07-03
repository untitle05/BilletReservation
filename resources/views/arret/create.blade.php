@extends('layout.inside')


@section('js')
{{-- <script src="{{ asset('semantic/semanticui.min.js') }}"></script> --}}
<script src="{{asset('semantic/components/transition.js') }}"></script>
<script src="{{asset('semantic/components/form.js') }}"></script>
@stop
@section('content')
@if(session('store'))
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

<div class="ui grid">
    <div class="four wide column">
        <div class="ui vertical fluid tabular menu">
            <a class="active item">
                Enregistrer un arret
            </a>
            <a class="item">
                Modifier
            </a>
            <a class="item">
                Supprimer
            </a>

        </div>
    </div>
    <div class="twelve wide stretched column">
        <div class="ui segment" style="width:50%;">
            <form class="ui form" action="{{ url('/arret') }}" method="post">
                @csrf
                <div class="field">
                    <label for="destination_id">Destination</label>
                    <select class="ui fluid search dropdown" style="width:100%" name="destination_id"
                        id="destination_id">
                        <option value="">Choisir la destination de destination</option>
                        @foreach($destinations as $destination)
                        <option value="{{ $destination->id }}">{{ $destination->destination_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field">
                    <label>Nom de l'arret</label>
                    <input type="text" name="nom_arret" id="nom_arret" placeholder="Entrer le nom de l'arret">
                </div>
                <button class="ui button" type="submit">Creer</button>
            </form>
        </div>
        <div>
        </div>



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

// $('.add').on('click', function(e){
//     var counter=1
//     e.preventDefault();
//     var clone = $(".arret-unit").clone();
//     counter += 1;
//     clone.appendTo('.arret-list');
//     clone.attr('id', 'arret_id' + counter);
//     clone.find('select').dropdown();
//     clone.find('select').click().fadeIn;
    
//     });
        </script>
        @stop