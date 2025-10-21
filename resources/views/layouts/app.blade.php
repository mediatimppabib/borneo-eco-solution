<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>@yield('title','Borneo Eco Solution')</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

  <!-- Main CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

  <meta name="theme-color" content="#0C3B2E"/>
</head>
<body>

  @include('partials.header')

  <main id="main">
    @yield('content')
  </main>

  @include('partials.footer')

  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
