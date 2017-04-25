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

{{-- @if (count($lastPosts))
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    @for ($i=0; $i < sizeOf($lastPosts); $i++)
      <li data-target="#myCarousel" data-slide-to="{{ $i }}"></li>

    @endfor
  </ol>

  <div class="carousel-inner" role="listbox">

    @for ($i = 0; $i < sizeOf($lastPosts); $i++)
      <div class="carousel-item @if($i ==0) active @endif">
        <img class="slide" src="uploads/posts/{{ $lastPosts[$i]->image }}" alt="{{ $lastPosts[$i]->title }}">
        <div class="container">
          <div class="carousel-caption d-none d-md-block text-left">
            <h1>{{ $lastPosts[$i]->title }}</h1>
            <p>{{ $lastPosts[$i]->body }}</p>

            <p><a class="btn btn-lg btn-primary" href="/posts/{{ $lastPosts[$i]->id }}" role="button">See Details!</a></p>
          </div>
        </div>
      @endfor
    </div>

  @endif --}}
