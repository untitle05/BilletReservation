{{-- {{ dd($destinations)}} --}}

@extends('layout.inside')

@section('css')
{!! Html::style('semantic/font-awesome.min.css')!!}
{!! Html::style('semantic/components/message.css') !!}
{!! Html::style('semantic/calendar.min.css') !!}
@stop

@section('js')
<script src="{{ asset('semantic/calendar.min.js') }}"></script>
<script src="{{ asset('semantic/message.js') }}"></script>
<script src="{{ asset('semantic/semanticui.min.js') }}"></script>
<script src="{{asset('semantic/components/transition.js') }}"></script>
<script src="{{asset('semantic/components/form.js') }}"></script>
@stop
@section('content') @if(session()->has('store'))
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


<h1>Nouveau voyage</h1>
<hr> {!! Form::open(['url' => 'voyage', 'method' => 'post', 'class' => 'ui form insert_voyage']) !!}
<h4 class="ui dividing header">Definition des horaires</h4>
<div class="two fields">
    <div class="field {!! $errors->has('dateDep_voy') ? 'has-error' : '' !!}" style="width:40%">
        <label for="dateDep_voy">Date et heure de depart</label>
        <div class="ui calendar" id="example2">
            <div class="ui input left icon">
                <i class="calendar icon"></i>
                <input type="text" id="dateDep_voy" name="dateDep_voy"
                    placeholder="Chosir la date et l'heure de depart">
                {!! $errors->first('dateDep_voy', '
                <medium class="help-block">:message</medium>') !!}
            </div>
        </div>
    </div>

    <div class="field {!! $errors->has('dateArrv_voy') ? 'has-error' : '' !!}" style="width:40%">
        <label for="dateArrv_voy">Date et heure d'arrivée</label>
        <div class="ui calendar" id="example2">
            <div class="ui input left icon">
                <i class="calendar icon"></i>
                <input type="text" id="dateArrv_voy" name="dateArrv_voy"
                    placeholder="Chosir la date et l'heure d'arrivée">
                {!! $errors->first('dateArrv_voy', '
                <medium class="help-block">:message</medium>') !!}
            </div>
        </div>
    </div>
</div>

<h4 class="ui dividing header">informations sur le vehicule</h4>
<div class="field">
    <div class="three fields">
        <div class="field {!! $errors->has('vehicule_id') ? 'has-error' : '' !!}">
            <label for="">Immatriculation</label>
            <select class="ui fluid search dropdown" style="width:100%" name="vehicule_id" id="vehicule_id">
                <option value="">Choisir l'immatriculation du vehicule</option>
                @foreach($vehicules as $key => $vehicule)
                <option value="{{ $vehicule->id }}" data-marque="{{ $vehicule->marque_vehi }}"
                    data-place="{{ $vehicule->nbrPlace_vehi }}">{{ $vehicule->immat_vehi }}</option>
                @endforeach
            </select> {!! $errors->first('vehicule_id', '
            <medium class="help-block">:message</medium>') !!}
        </div>

        <div class="field {!! $errors->has('marque_vehi') ? 'has-error' : '' !!}">
            <label for="marque_vehi">Marque du vehicule</label>
            <input type="text" id="marque_vehi" name="marque_vehi" placeholder="Montant prevu" disabled> {!!
            $errors->first('marque_vehi', '
            <medium class="help-block">:message</medium>') !!}
        </div>

        <div class="field {!! $errors->has('nbrPlace_voy') ? 'has-error' : '' !!}" style="width:15%;">
            <label for="nbrPlace_voy">Nombre de places</label>
            <input type="number" id="nbrPlace_voy" name="nbrPlace_voy" placeholder="Montant prevu" disabled> {!!
            $errors->first('nbrPlace_voy', '
            <medium class="help-block">:message</medium>') !!}
        </div>
    </div>
</div>

<h4 class="ui dividing header">informations sur le trajet et les frais</h4>
<div class="field">
    <div class="two fields">
        <div class="field {!! $errors->has('destination_id') ? 'has-error' : '' !!}">
            <label for="">Destination</label>
            <select class="ui fluid search dropdown" style="width:100%" name="destination_id"
                id="destination_id">
                <option value="">Choisir choisir la Destination</option>
                @foreach($destinations as $key => $destination)
                <option value="{{ $destination->id }}">{{ $destination->destination_name }}</option>
                @endforeach
            </select> {!! $errors->first('destination_id', '
            <medium class="help-block">:message</medium>') !!}
        </div>

        <div class="field" style="width: 20%;">
            <label>Frais</label>
            <div class="ui right labeled input">
                <input type="number" name="frais" id="frais" placeholder="Frais de transport">
                <div class="ui basic label">
                    FCFA
                </div>
            </div>
        </div>
    </div>

</div>

{!! Form::submit('Enregistrer',['class' => 'ui primary button'] ) !!}
<br> {!! Form::close() !!}
<br>
<br>
<br>
@stop

@section('script')
<script>
    $('.ui.calendar').calendar();
    semantic.validateForm = {};

// ready event
semantic.validateForm.ready = function() {
    $('select.dropdown').dropdown();
};


// attach ready event
$(document).ready(semantic.validateForm.ready);

$('#vehicule_id').on('change', function(){
     let marque = $(this).children("option:selected").data('marque'),
         placeNumber = $(this).children("option:selected").data('place');
         $('#marque_vehi').val(marque);
         $('#nbrPlace_voy').val(placeNumber);
});

$('#insert_voyage').on('submit', function(e){
    let value = $('#destination_id').val();
    console.log(value);
    if($('#destination_id').val()=== value){
        alert('Attention la destination d\'arrivee ne peut pas etre identique a la destination de depart');
    }
    // console.log(value);
});

// $('#id_destination_arrivee').on('change', function(e){
//         let id_destination_arrivee = e.target.value;
//         $.get('/json-arretsDest?id_destination_arrivee=' + id_destination_arrivee, function(data){
//                 console.log(data[0].arrets.length);
//                 let count = data[0].arrets.length,
//                     numberDivs = convertNumberToWords(data[0].arrets.length).toLowerCase(),
//                     firstDivnumber;
//                     var allArretsDiv;

//                     firstDivnumber = '<div class = "' + numberDivs + 'fields list">' +
//                                      '</div>'; 
//                 $('.arretList').append(firstDivnumber);
//                     $('.list').append('<label>Arrets Disponibles </label>');

//                     for(let i=0; i < count; i++ ){ 
//                             allArretsDiv ='<div class="field" style = "width:20%;">' +
//                                     '<input type="text" name="nom_arret" id="nom_arret" placeholder="" value=' + data[0].arrets[i].nom_arret + '>' +
//                                     '</div>';
//                     $('.list').append(allArretsDiv);
//             }

//         });
    
// });


// function convertNumberToWords(amount) {
//     var words = new Array();
//     words[0] = '';
//     words[1] = 'One';
//     words[2] = 'Two';
//     words[3] = 'Three';
//     words[4] = 'Four';
//     words[5] = 'Five';
//     words[6] = 'Six';
//     words[7] = 'Seven';
//     words[8] = 'Eight';
//     words[9] = 'Nine';
//     words[10] = 'Ten';
//     words[11] = 'Eleven';
//     words[12] = 'Twelve';
//     words[13] = 'Thirteen';
//     words[14] = 'Fourteen';
//     words[15] = 'Fifteen';
//     words[16] = 'Sixteen';
//     words[17] = 'Seventeen';
//     words[18] = 'Eighteen';
//     words[19] = 'Nineteen';
//     words[20] = 'Twenty';
//     words[30] = 'Thirty';
//     words[40] = 'Forty';
//     words[50] = 'Fifty';
//     words[60] = 'Sixty';$('#id_destination_arrivee').on('change', function(e){
//         let id_destination_arrivee = e.target.value;
//         $.get('/json-arretsDest?id_destination_arrivee=' + id_destination_arrivee, function(data){
//                 console.log(data[0].arrets.length);
//                 let count = data[0].arrets.length,
//                     numberDivs = convertNumberToWords(data[0].arrets.length).toLowerCase(),
//                     firstDivnumber;
//                     var allArretsDiv;

//                     firstDivnumber = '<div class = "' + numberDivs + 'fields list">' +
//                                      '</div>'; 
//                 $('.arretList').append(firstDivnumber);
//                     $('.list').append('<label>Arrets Disponibles </label>');

//                     for(let i=0; i < count; i++ ){ 
//                             allArretsDiv ='<div class="field" style = "width:20%;">' +
//                                     '<input type="text" name="nom_arret" id="nom_arret" placeholder="" value=' + data[0].arrets[i].nom_arret + '>' +
//                                     '</div>';
//                     $('.list').append(allArretsDiv);
//             }

//         });
    
// });


// function convertNumberToWords(amount) {
//     var words = new Array();
//     words[0] = '';
//     words[1] = 'One';
//     words[2] = 'Two';
//     words[3] = 'Three';
//     words[4] = 'Four';
//     words[5] = 'Five';
//     words[6] = 'Six';
//     words[7] = 'Seven';
//     words[8] = 'Eight';
//     words[9] = 'Nine';
//     words[10] = 'Ten';
//     words[11] = 'Eleven';
//     words[12] = 'Twelve';
//     words[13] = 'Thirteen';
//     words[14] = 'Fourteen';
//     words[15] = 'Fifteen';
//     words[16] = 'Sixteen';
//     words[17] = 'Seventeen';
//     words[18] = 'Eighteen';
//     words[19] = 'Nineteen';
//     words[20] = 'Twenty';
//     words[30] = 'Thirty';
//     words[40] = 'Forty';
//     words[50] = 'Fifty';
//     words[60] = 'Sixty';
//     words[70] = 'Seventy';
//     words[80] = 'Eighty';
//     words[90] = 'Ninety';
//     amount = amount.toString();
//     var atemp = amount.split(".");
//     var number = atemp[0].split(",").join("");
//     var n_length = number.length;
//     var words_string = "";
//     if (n_length <= 9) {
//         var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
//         var received_n_array = new Array();
//         for (var i = 0; i < n_length; i++) {
//             received_n_array[i] = number.substr(i, 1);
//         }
//         for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
//             n_array[i] = received_n_array[j];
//         }
//         for (var i = 0, j = 1; i < 9; i++, j++) {
//             if (i == 0 || i == 2 || i == 4 || i == 7) {
//                 if (n_array[i] == 1) {
//                     n_array[j] = 10 + parseInt(n_array[j]);
//                     n_array[i] = 0;
//                 }
//             }
//         }
//         value = "";
//         for (var i = 0; i < 9; i++) {
//             if (i == 0 || i == 2 || i == 4 || i == 7) {
//                 value = n_array[i] * 10;
//             } else {
//                 value = n_array[i];
//             }
//             if (value != 0) {
//                 words_string += words[value] + " ";
//             }
//             if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
//                 words_string += "Crores ";
//             }
//             if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
//                 words_string += "Lakhs ";
//             }
//             if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
//                 words_string += "Thousand ";
//             }
//             if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
//                 words_string += "Hundred and ";
//             } else if (i == 6 && value != 0) {
//                 words_string += "Hundred ";
//             }
//         }
//         words_string = words_string.split("  ").join(" ");
//     }
//     return words_string;
// }
//     words[70] = 'Seventy';
//     words[80] = 'Eighty';
//     words[90] = 'Ninety';
//     amount = amount.toString();
//     var atemp = amount.split(".");
//     var number = atemp[0].split(",").join("");
//     var n_length = number.length;
//     var words_string = "";
//     if (n_length <= 9) {
//         var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
//         var received_n_array = new Array();
//         for (var i = 0; i < n_length; i++) {
//             received_n_array[i] = number.substr(i, 1);
//         }
//         for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
//             n_array[i] = received_n_array[j];
//         }
//         for (var i = 0, j = 1; i < 9; i++, j++) {
//             if (i == 0 || i == 2 || i == 4 || i == 7) {
//                 if (n_array[i] == 1) {
//                     n_array[j] = 10 + parseInt(n_array[j]);
//                     n_array[i] = 0;
//                 }
//             }
//         }
//         value = "";
//         for (var i = 0; i < 9; i++) {
//             if (i == 0 || i == 2 || i == 4 || i == 7) {
//                 value = n_array[i] * 10;
//             } else {
//                 value = n_array[i];
//             }
//             if (value != 0) {
//                 words_string += words[value] + " ";
//             }
//             if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
//                 words_string += "Crores ";
//             }
//             if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
//                 words_string += "Lakhs ";
//             }
//             if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
//                 words_string += "Thousand ";
//             }
//             if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
//                 words_string += "Hundred and ";
//             } else if (i == 6 && value != 0) {
//                 words_string += "Hundred ";
//             }
//         }
//         words_string = words_string.split("  ").join(" ");
//     }
//     return words_string;
// }
</script>
@stop