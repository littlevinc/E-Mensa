<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>7 a Queryparameter</title>
    </head>
    <body>

    <h1>7 a Queryparameter</h1>
        @if(isset($name))
            <p>Der Wert von?name lautet: {{ $name }}</p>
        @else
            <p>Es wurde kein Wert übergeben</p>
        @endif
    </body>
</html>