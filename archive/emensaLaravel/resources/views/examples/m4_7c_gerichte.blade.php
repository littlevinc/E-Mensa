<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <table>
        <tr>
            <td>Name</td>
            <td>Beschreibung</td>
            <td>Preis Intern</td>
        </tr>

        @foreach($gerichte as $element)
        <tr>
            <td>{{ $element['name'] }}</td>
            <td>{{ $element['beschreibung'] }}</td>
            <td>{{ $element['preis_intern']   }}</td>
        </tr>
        @endforeach



    </table>



</body>
</html>
