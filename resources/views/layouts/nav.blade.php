<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="/">MyFitnessProgram</a>
  <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
    {{-- <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Training</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Meal plans</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Sports</a>
      </li>
    </ul> --}}

    @if (count($archives))
      <div class="dropdown">
        <button class="btn btn-primary btn-space btn-responsive dropdown-toggle" type="button" data-toggle="dropdown">Archives
          <span class="caret"></span></button>
          <ul class="dropdown-menu" role="menu">
            @foreach ($archives as $stats)
              <li>
                <a class="nav-link" href="/?month={{ $stats['month'] }}&year={{ $stats['year'] }}">
                  {{ $stats['month'] . ' ' . $stats['year'] }}
                </a>
              </li>
            @endforeach
          </ul>
        </div>
      @endif

      @if (count($tags))
        <div class="dropdown">
          <button class="btn btn-primary btn-space btn-responsive dropdown-toggle" type="button" data-toggle="dropdown">Tags
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              @foreach ($tags as $tag)
                <li>
                  <a class="nav-link" href="/posts/tags/{{ $tag }}">
                    {{ $tag }}
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
        @endif


      <!-- Right Side Of Navbar -->
      <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @if (Auth::guest())
              <li class="nav-item"><a class="nav-link text-primary" href="/login">Login</a></li>
              <li class="nav-item"><a class="nav-link text-success" href="/register">Register</a></li>
          @else
            <li class="dropdown">
              <a href="#" class="btn btn-primary btn-space btn-responsive dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>
                  <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; top:10px; left:10px; border-radius:50%">

                  <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu">
                      <li class="nav-item"><a href="/profile">Profile</a> </li>
                      <li class="nav-item"><a href="/logout">Logout</a> </li>

                  </ul>
              </li>
          @endif
      </ul>
    </div>
  </nav>
