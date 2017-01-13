<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <title>Blood n' Gears - Admin</title>
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
  <!-- Navigation -->
  @include('admin.main-nav')
  
  <div class="admin">
    @yield('content')
  </div>

  <!-- Javascripts -->
  <script src="{{ asset('js/main.js') }}"></script>
  @stack('js_footer')
</body>
</html>