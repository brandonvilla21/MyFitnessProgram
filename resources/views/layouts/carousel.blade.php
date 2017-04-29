@if (count($posts))
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        @for ($i = 0; $i < sizeOf($posts); $i++)
          <div class="carousel-item @if($i ==0) active @endif">

            <img class="img-responsive" src="/uploads/posts/{{ $posts[$i]->image }}" alt="{{ $posts[$i]->title }}">
            <div class="container">
              <div class="carousel-caption d-none d-md-block text-left">
                <h1>{{ $posts[$i]->title }}</h1>
                <p class="lead">{{ $preview = substr($posts[$i]->body, 0, 100) . '...'}}</p>
                <p><a class="btn btn-lg btn-primary" href="/posts/{{ $posts[$i]->id }}" role="button">See Details!</a></p>
              </div>
            </div>
          </div>

          {{-- Only load the last five post on the carousel --}}
          @if ($i == 4)
            @break
          @endif

        @endfor
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    </div>

  @else
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="first-slide" src="/images/carousel1.jpg" alt="Create your account">
          <div class="container">
            <div class="carousel-caption d-none d-md-block text-left">
              <h1>Create your account and share everything you want.</h1>
              <p><a class="btn btn-lg btn-primary" href="/register" role="button">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item img-responsive">
          <img class="second-slide" src="/images/carousel2.jpg" alt="Find your plan">
          <div class="container">
            <div class="carousel-caption d-none d-md-block">
              <h1>Find a plan.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="third-slide" src="/images/carousel3.jpg" alt="Find your plan">
          <div class="container">
            <div class="carousel-caption d-none d-md-block text-right">
              <h1>Start your fitness program today.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>


  @endif
