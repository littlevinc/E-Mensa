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


<h2 style="margin-top: 100px">Bewertung</h2>

<section>

    @if(isset($_GET['id']) && isset($_GET['show']))
        @foreach($gerichte as $bild)
            @if($bild['id'] == $_GET['id'])
                @if(file_exists("/Users/luke/Desktop/GitHub/E-Mensa/emensamobil/public/img/gerichte/" . $bild['bildname']))
                    <td><img src="/img/gerichte/{{$bild['bildname']}}" alt="{{$bild['bildname']}}" style="width:100px; height: 100px; object-fit:cover"></td>
                @else
                    <td><img src="/img/gerichte/00_image_missing.jpg" alt="Image Missing" style="width:100px; height: 100px; object-fit:cover"></td>
                @endif
            @endif
        @endforeach
    @endif

    @if(isset($error))
        <p>Fehler: {{$error}}</p>
    @endif
    <form action="/bewertung_store" method="POST" style="margin-top:20px;min-width: 300px;" >
        <fieldset>
            <div class="formfield">
                <select name="gericht" id="gericht">

                    @if(!isset($_GET['id']))
                        <option value="" disabled selected>Gericht wählen</option>
                    @else
                        <option value="" disabled>Gericht wählen</option>
                    @endif

                    @foreach($gerichte as $gericht)

                        @if($gericht['id'] == $_GET['id'])
                            <option value="{{ $gericht['id']}}" selected> {{ $gericht['name'] }}</option>
                        @else
                            <option value="{{ $gericht['id']}} "> {{ $gericht['name'] }}</option>
                        @endif

                    @endforeach
                </select>
            </div>
            <div class="formfield">
                <input type="text" placeholder="Bemerkung" name="bemerkung" required style="min-width: 450px">
            </div>
            <div class="formfield">
                <select name="sterne" id="sterne">
                    <option value="" selected disabled>Sterne wählen</option>
                    <option value="1">Sehr gut</option>
                    <option value="2">Gut</option>
                    <option value="3">Schlecht</option>
                    <option value="4">Sehr schlecht</option>
                </select>

            </div>
            <input type="submit" class="custom-button" name="bewertung" value="Bewerten">
        </fieldset>
    </form>
</section>

<h2 style="margin-top: 100px">Vorherige Bewertungen</h2>
<section>

    <table class="flex-table" style="min-width: 200px">
        <tr>
            <th style="max-width: 400px">Gericht</th>
            <th>Bemerkung</th>
            <th>Sterne</th>
            <th>Bewertungszeitpunkt</th>
            @if($_SESSION['admin'])
                <th>Hervorgehoben</th>
                <th>Darstellung Ändern</th>
            @endif
        </tr>

        @foreach($bewertungen as $bewertung)
            <tr>
                <td >{{ $bewertung['name'] }}</td>
                <td>{{ $bewertung['bemerkung'] }}</td>
                <td>{{ $bewertung['sterne'] }}</td>
                <td>{{ $bewertung['bewertungszeitpunkt'] }}</td>

                @if($_SESSION['admin'])
                    <td>@if($bewertung['hervorgehoben']) <p style="color:green;text-align: center;">True</p> @else <p style="color:red;text-align:center;">False</p> @endif</td>
                    <td><a href="/change_visibility?id={{ $bewertung['idBewertung']}} ">Ändern</a></td>
                @endif
            </tr>
        @endforeach


    </table>

</section>

</body>
</html>