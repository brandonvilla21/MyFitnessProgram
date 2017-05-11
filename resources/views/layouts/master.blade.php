<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>MyFitnessProgram</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="{{ URL::to('js/complements.js') }}"></script>﻿
  <!-- Custom styles for this template -->
  <link href="/css/carousel.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/complements.css">
  <link rel="icon" href="gym_icon.ico">

</head>

<body>

  @include('layouts.nav')

  @if ($flash = session('message'))
    <div id="flash-message" class="alert alert-success" role="alert">
      {{ $flash }}
    </div>
  @endif

  @yield('content')


  <div class="container">
    {{-- @include('layouts.heading') --}}

    @include('layouts.footer')

  </div><!-- container -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>

</html>
