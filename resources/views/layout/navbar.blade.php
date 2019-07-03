<div class="ui menu" style="width:31.74%;">
  <a class="item">
    Accueil
  </a>
  <div class="ui pointing dropdown link item">
    <span class="text">Paramètres</span>
    <i class="dropdown icon"></i>
    <div class="menu">
      <a class="item" href="{{ url('vehicule') }}">Véhicules</a>
      <a class="item" href="{{ url('arret') }}">Arrets</a>
      <a class="item" href="{{ url('destination') }}">Destinations</a>
    </div>
  </div>
  <a href="{{url('voyage')}}" class="item">
    Voyages
  </a>
  <a class="item">
    Reservations
  </a>
</div>