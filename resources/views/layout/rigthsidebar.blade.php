<div class="ui secondary menu" style='font-size:1em'>
        <div class="right menu" style="position:relative; top:-92px;">
          @auth 
          <div class="ui small circular image">
            {{-- <img src="{{ url('/images/avatars/'.Auth::user()->avatar) }}" style="width:32px; height:32px; position:relative; top:16px; right:-118px"> --}}
          </div>
          <div class="ui dropdown item" tabindex="0">
            {{ Auth::user()->name }} <i class="dropdown icon"></i>
            <div class="menu" tabindex="-1">
              <a class="item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
      {{ __('Logout') }}
      </a>
              <form id="logout-form" action="{{ route('logout') }}" class='ui form' method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </div>
          @endauth
        </div>
      </div>