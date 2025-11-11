<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <title>{{ env('APP_TITLE') }}</title>
  
  @include('inc.head.meta')
</head>

<body>
  @yield('content_page')
   
  @yield('footer_page')
</body>
</html>