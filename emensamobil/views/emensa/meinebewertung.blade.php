<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Werbeseite</title>
    <!-- CSS sehr generisch daher direkt in Layout included-->
    <link rel="stylesheet" href="https://use.typekit.net/qxh4wpt.css">
    <link rel="stylesheet" href="/css/style.css">

</head>
<body>
{{-- Trying to include Navbar Did not Work--}}
<nav>
    <div class="logo-text"><a href="/" class="logo-text" style="text-decoration: none">E Mensa</a></div>
    <ul>
        <li><a href="#ankuendigungen">Ankündigung</a></li>
        <li><a href="#speisen">Speisen</a></li>
        <li><a href="#zahlen">Zahlen</a></li>
        <li><a href="#kontakt">Kontakt</a></li>
        <li><a href="#wichtig">Wichtig für uns</a></li>
    </ul>
</nav>


<h2 style="margin-top: 100px">Bewertungen von {{ $user }}</h2>
<section>

    <table class="flex-table" style="min-width: 700px">
        <tr>
            <th style="max-width: 400px">Gericht</th>
            <th>Bemerkung</th>
            <th>Sterne</th>
            <th>Bewertungszeitpunkt</th>
            <th>Löschen</th>
        </tr>

        @foreach($bewertungen as $bewertung)
            <tr>
                <td >{{ $bewertung['name'] }}</td>
                <td>{{ $bewertung['bemerkung'] }}</td>
                <td>{{ $bewertung['sterne'] }}</td>
                <td>{{ $bewertung['bewertungszeitpunkt'] }}</td>
                <td><a href="/delete_review?id={{ $bewertung['idBewertung'] }}">Löschen</a></td>
            </tr>
        @endforeach


    </table>

</section>

</body>
</html>