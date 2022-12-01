@extends('emensa.layout_home')


@section('header')
    <header>
        <img src="/img/homepage-header.webp" alt="homepage header mensa" width = "50%">
    </header>
@endsection

@section('introduction')
    <h2 id="ankuendigungen">Bald gibt es Essen auch online!</h2>
    <section>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem fuga ipsa iusto non obcaecati rem, sunt vitae! Accusamus deleniti deserunt dolorem dolores molestiae neque optio possimus reiciendis? Neque, sit ullam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad atque cum, cumque deserunt distinctio dolorem ex quis,
            quod saepe tempore temporibus vitae? Beatae esse est placeat quaerat ullam vel, voluptatum? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aperiam architecto assumenda aut cupiditate ex exercitationem fugit laborum maxime modi non omnis qui rerum sint sit ullam velit, vitae voluptatum.</p>
    </section>
@endsection


@section('content')

    <h2 id="speisen">Köstlichkeiten, die Sie erwarten</h2>
    <section>
        <table class="flex-table">
            <tr>
                <th>Gericht</th>
                <th>Interne</th>
                <th>Externe</th>

            </tr>

            @foreach($gerichte as $gericht)
            <tr>
                <td>{{ $gericht['name'] }} ><sub> {{$gericht['allergene']}} </sub></td>
                <td>{{$gericht['preis_intern']}}</td>
                <td>{{$gericht['preis_extern']}}</td>
            </tr>
            @endforeach
        </table>
    </section>

    <h2 id="zahlen">E-Mensa im Zahlen</h2>
    <section class="col-3">
        <div>
            <p class="section-highlight">x</p>
            <p class="section-subtext">Besuche</p>
        </div>
        <div>
            <p class="section-highlight">y</p>
            <p class="section-subtext">Anmeldungen zum Newsletter</p>
        </div>
        <div>
            <p class="section-highlight">z</p>
            <p class="section-subtext">Speisen</p>
        </div>
    </section>

    <h2 id="kontakt" >Interesse geweckt, Wir informieren Sie</h2>
    <section>
        {{-- Wie sollte sowas hier richtig integriert werden? --}}
        {{-- php include ("newsletter.php"); --}}
    </section>

    <h2 id="wichtig">Das ist uns wichtig</h2>
    <section class="col-3">
        <div>
            <img src="img/apple.png" alt="apple icon" width="50px" class="center">
            <p class="section-subtext">Frische Zutaten</p>
        </div>
        <div>
            <img src="img/bowl.png" alt="bowl icon" width="50px" class="center">
            <p class="section-subtext">Ausgewogenen Gerichte</p>
        </div>
        <div>
            <img src="img/mask.png" alt="mask icon" width="50px" class="center">
            <p class="section-subtext">Sauberkeit</p>
        </div>
    </section>

    <section>
        <a href="/wunschgericht.php" class="custom-button">Gericht vorschlagen</a>
        <h3 id="greetings">Wir freuen uns auf Ihren Besuch</h3>
    </section>

@endsection


