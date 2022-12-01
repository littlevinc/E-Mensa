<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- CSS sehr generisch daher direkt in Layout included--}}
    <link rel="stylesheet" href="https://use.typekit.net/qxh4wpt.css">
    {{-- Könnte man hier auch mit <?php include("style.css") arbeiten? --}}

</head>
<body>

{{-- Trying to include Navbar --}}

{{-- Header --}}
@yield('header')

{{-- Begrüßungstext --}}
@yield('introduction')

{{-- Gerichteübersicht --}}
@yield('content')

{{-- Footer Direkt in --}}
<footer>
    <ul>
        <li>(c) E-Mensa GmbH</li>
        <li>Luke & Kai</li>
        <li><a href="/impressum.html">Impressum</a></li>
    </ul>
</footer>

</body>
</html>