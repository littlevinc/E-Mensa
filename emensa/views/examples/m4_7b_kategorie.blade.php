<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>7b Kategorie</title>
</head>
<body>
    <h1>7b Kategorie</h1>
    <ul>
        @foreach($kategorien as $kategorie)
            @if($loop->odd)
                <li> <b> {{$kategorie['name']}} </b> </li>
            @else
                <li> {{$kategorie['name']}} </li>
            @endif
        @endforeach
    </ul>
</body>
</html>

