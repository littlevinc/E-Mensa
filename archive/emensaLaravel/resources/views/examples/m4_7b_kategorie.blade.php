<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>

        .columntitle {
            font-size: 25px;
            font-weight: bold;
            text-align: center;
        }

        table {
            border: 1px solid black;
            min-width: 250px;
        }

        tr:nth-child(2n) {
            font-weight: bold;
        }

    </style>
</head>
<body>


    <table>

        <tr>
            <td class="columntitle">Kategorien</td>
        </tr>

        @foreach($kategorien as $cat)
        <tr>
            <td>{{ $cat['name'] }}</td>
        </tr>
        @endforeach

    </table>


</body>
</html>
