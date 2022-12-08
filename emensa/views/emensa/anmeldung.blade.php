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
    <!--
    <div class="logo"><img src="pictures/mensa-logo.png" alt="E-Mensa Logo" width="100px"></div>
    -->
    <div class="logo-text">E Mensa</div>
    <ul>
        <li><a href="#ankuendigungen">Ankündigung</a></li>
        <li><a href="#speisen">Speisen</a></li>
        <li><a href="#zahlen">Zahlen</a></li>
        <li><a href="#kontakt">Kontakt</a></li>
        <li><a href="#wichtig">Wichtig für uns</a></li>
    </ul>
</nav>
<h2>Anmeldung</h2>

<section>
    @if(isset($error))
        <p>Fehler? {{$error}}</p>
    @endif
    <form action="/anmeldung_verifizieren" method="POST">
        <fieldset>
            <div class="formfield">
                <input type="email" placeholder="E-Mail" name="email" required>
            </div>
            <div class="formfield">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <input type="submit" class="custom-button" name="anmeldung", value="Anmelden">
        </fieldset>
    </form>
</section>
</body>
</html>