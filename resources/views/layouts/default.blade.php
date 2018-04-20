<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title','Blog')</title>
    <link rel="stylesheet" href="/css/app.css?13123">
    <script src="/js/app.js"></script>
</head>
<body>
@include('layouts._header')


<div class="container">
    <div class="col-md-offset-1 col-md-10">
        @include('shared._message')
        @yield('content')
        @include('layouts._footer')
    </div>
</div>



</body>
</html>