<?php
    session_start();

    if(!isset($_SESSION['id'])) {
        $_SESSION['id'] = 'lukes session';
    } else {
        echo $_SESSION['id'];
    }

?>


<nav>
    <div class="logo-text">
        <a href="/">
            E Mensa
        </a>
    </div>

    <ul>
        <li><a href="#ankuendigungen">Ankündigung</a></li>
        <li><a href="#speisen">Speisen</a></li>
        <li><a href="#zahlen">Zahlen</a></li>
        <li><a href="#kontakt">Kontakt</a></li>
        <li><a href="#wichtig">Wichtig für uns</a></li>
        <li><a href="/login">Anmelden</a></li>
    </ul>

    <div>

    </div>
</nav>
