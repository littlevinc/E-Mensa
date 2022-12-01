<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>7c Gerichte</title>
</head>
<body>

<h1>7c Gerichte</h1>

@if(!$gerichte)
    <p>Es sind keine Gerichte vorhanden</p>
@else
<table>
    <thead>
    <th>Name</th>
    <th>Interner Preis</th>
    </thead>
    @foreach($gerichte as $gericht)
        <tr>
            <th>{{$gericht['name']}}</th>
            <th>{{$gericht['preis_intern']}}</th>
        </tr>
    @endforeach
</table>
@endif

</body>
</html>