<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Blog')</title>
    <link rel="stylesheet" href="/css/app.css?111">
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