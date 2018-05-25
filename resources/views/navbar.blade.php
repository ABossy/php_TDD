<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Home</a></li>
        <li><a href="/project">Project</a></li> 
        @if ( Auth::user())
        <li><a href="/creation">Créer un Projet</a></li>  
      </ul>
      @endif 
  {{-- ici on verifie avec le if si Auth::user() existe 
  dans ce cas les liens sont ouverts à defaut il n'y aura que le lien Home et project de visible --}}

      @guest  
      <li><a href="{{ route('login') }}">Login</a></li>
      <li><a href="{{ route('register') }}">Register</a></li>
      @else
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
          {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <ul class="dropdown-menu">
          <li>
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Logout
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </li>
      </ul>
    </li>
    @endguest
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
  </div>
</nav>