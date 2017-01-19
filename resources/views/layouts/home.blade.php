<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blood n' Gears</title>
  <link rel="stylesheet" href="/css/main.css">
</head>
<body>
  <!-- Navigation -->
  @include('site.main-nav')

  @yield('header')

  <!-- Main Body -->
  <section class="main-body">
    @yield('content')
  </section>

  <!-- Javascripts -->
  <script src="/js/main.js"></script>
</body>
</html>
