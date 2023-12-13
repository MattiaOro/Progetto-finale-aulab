{{-- navbar per grandi schermi --}}
<nav class="d-none d-md-block">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-6 d-flex justify-content-evenly  align-items-center ">
        
        
        {{--! Solo per utenti autenticati --}}
        
        
        {{-- ! utenti guest --}}
        
        
        {{-- !Solo per utenti autenticati --}}
        {{-- @auth
          <a class="nav-link active pe-2 fs-5 text-center" href="{{route('careers')}}">Lavora con noi!</a></li>
          @if(Auth::user()->is_admin)
          <a class="nav-link active pe-2 fs-5 text-center" href="{{route('admin.dashboard')}}">Dashboard Admin</a></li>
          @endif
          @if (Auth::user()->is_revisor)
          <a class="nav-link active pe-2 fs-5 text-center"  href="{{route('revisor.dashboard')}}">Dashboard Revisor</a></li>
          @endif
          @endauth
          --}}
          
          
          
          <a href="{{route('homepage')}}"><i class="bi bi-house-door-fill p-0 link-profilo"></i></a>
          <button class="btn-article watch" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{-- <li class="nav-link active"><form method="POST" action="{{route('logout')}}">@csrf <button type="submit">Logout</button></form></li> --}}
          </li>
          
          <i class="bi bi-file-plus-fill p-0 link"></i>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{route('Articles.index')}}">visualizza articoli</a></li>
          
          @auth
          <li><a class="dropdown-item" href="{{route('Articles.create')}}">aggiungi articolo</a></li>
          @endauth
        </ul>
        
        
        <div class="dropdown">
          <button class="btn-article watch" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            
            
            <i class="bi bi-person-square p-0 link-articolo "></i>
          </button>
          
          <ul class="dropdown-menu">
            
            @guest
            <li><a class="dropdown-item" href="{{route('login')}}">login</a></li>
            <li><a class="dropdown-item" href="{{route('register')}}">registrati</a></li>
            
            @endguest
            @auth
            <a class="nav-link active pe-2 fs-5 text-center text-white" href="{{route('careers')}}">Lavora con noi!</a></li>
            @if(Auth::user()->is_admin)
            <a class="nav-link active pe-2 fs-5 text-center text-white" href="{{route('admin.dashboard')}}">Dashboard Admin</a></li>
            @endif
            @if (Auth::user()->is_revisor)
            <a class="nav-link active pe-2 fs-5 text-center text-white"  href="{{route('revisor.dashboard')}}">Dashboard Revisore</a></li>
            @endif
            @if (Auth::user()->is_writer)
            <a class="nav-link active pe-2 fs-5 text-center text-white"  href="{{route('writer.dashboard')}}">Dashboard Redattore</a></li>
            @endif
            @endauth
            @auth
            <form method="POST" action="{{route('logout')}}">@csrf <button class="btn-logout text-center d-flex justify-content-center fs-5 "> Logout </button></form> 
            @endauth
            
          </ul>
          
        </div>
        {{-- <p class="profile text-black "> Benvenuto {{Auth::user()->name}}</p> --}}
        
        <form class="d-flex" method="GET" action="{{route('Article.search')}}">
          <input class="form-control me-2" type="search" name="query" placeholder="Cosa stai cercando" aria-label="search">
          <button class="btn btn-outline-dark" type="submit">Cerca</button>
        </form>
        
      </div>
    </div>
  </div>
</nav>




{{-- navbar per schermi piccoli --}}
<nav class="d-block d-md-none">
  <div class="container">
    <div class="row">
      <div class="col-12">
    <form class="d-flex" method="GET" action="{{route('Article.search')}}">
      <input class="form-control me-2" type="search" name="query" placeholder="Cosa stai cercando" aria-label="search">
      <button class="btn btn-outline-dark" type="submit">Cerca</button>
    </form>
    
  </div>
</div>
    <div class="row justify-content-center">
      
      <div class="col-12 d-flex justify-content-evenly  align-items-center ">
        
        
        {{--! Solo per utenti autenticati --}}
        
        
        {{-- ! utenti guest --}}
        
        
        {{-- !Solo per utenti autenticati --}}
        {{-- @auth
          <a class="nav-link active pe-2 fs-5 text-center" href="{{route('careers')}}">Lavora con noi!</a></li>
          @if(Auth::user()->is_admin)
          <a class="nav-link active pe-2 fs-5 text-center" href="{{route('admin.dashboard')}}">Dashboard Admin</a></li>
          @endif
          @if (Auth::user()->is_revisor)
          <a class="nav-link active pe-2 fs-5 text-center"  href="{{route('revisor.dashboard')}}">Dashboard Revisor</a></li>
          @endif
          @endauth
          --}}
          
          
          
          <a href="{{route('homepage')}}"><i class="bi bi-house-door-fill p-0 link-profilo"></i></a>
          <button class="btn-article watch" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{-- <li class="nav-link active"><form method="POST" action="{{route('logout')}}">@csrf <button type="submit">Logout</button></form></li> --}}
          </li>
          
          <i class="bi bi-file-plus-fill p-0 link"></i>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{route('Articles.index')}}">visualizza articoli</a></li>
          
          @auth
          <li><a class="dropdown-item" href="{{route('Articles.create')}}">aggiungi articolo</a></li>
          @endauth
        </ul>
        
        
        <div class="dropdown">
          <button class="btn-article watch" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            
            
            <i class="bi bi-person-square p-0 link-articolo "></i>
          </button>
          
          <ul class="dropdown-menu">
            
            @guest
            <li><a class="dropdown-item" href="{{route('login')}}">login</a></li>
            <li><a class="dropdown-item" href="{{route('register')}}">registrati</a></li>
            
            @endguest
            @auth
            <a class="nav-link active pe-2 fs-5 text-center text-white" href="{{route('careers')}}">Lavora con noi!</a></li>
            @if(Auth::user()->is_admin)
            <a class="nav-link active pe-2 fs-5 text-center text-white" href="{{route('admin.dashboard')}}">Dashboard Admin</a></li>
            @endif
            @if (Auth::user()->is_revisor)
            <a class="nav-link active pe-2 fs-5 text-center text-white"  href="{{route('revisor.dashboard')}}">Dashboard Revisore</a></li>
            @endif
            @if (Auth::user()->is_writer)
            <a class="nav-link active pe-2 fs-5 text-center text-white"  href="{{route('writer.dashboard')}}">Dashboard Redattore</a></li>
            @endif
            @endauth
            @auth
            <form method="POST" action="{{route('logout')}}">@csrf <button class="btn-logout text-center d-flex justify-content-center fs-5 "> Logout </button></form> 
            @endauth
            
          </ul>
          
        </div>
        {{-- <p class="profile text-black "> Benvenuto {{Auth::user()->name}}</p> --}}
      </div>
    </div>
        
  </div>
</nav>

