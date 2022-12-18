@extends('layouts.website')

@section('header')

    <x-navbar/>

@endsection

@section('content')

    </nav>
    <header>
        <img src="images/homepage-header.webp" alt="homepage header mensa" width = "50%">
    </header>
    <div>

        <h2 id="ankuendigungen">Bald gibt es Essen auch online!</h2>
        <section>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem fuga ipsa iusto non obcaecati rem, sunt vitae! Accusamus deleniti deserunt dolorem dolores molestiae neque optio possimus reiciendis? Neque, sit ullam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad atque cum, cumque deserunt distinctio dolorem ex quis,
                quod saepe tempore temporibus vitae? Beatae esse est placeat quaerat ullam vel, voluptatum? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aperiam architecto assumenda aut cupiditate ex exercitationem fugit laborum maxime modi non omnis qui rerum sint sit ullam velit, vitae voluptatum.</p>
        </section>

        <h2 id="speisen">Köstlichkeiten, die Sie erwarten</h2>
        <section>
            <table class="flex-table">
                <tr>
                    <th>Gericht</th>
                    <th>Interne</th>
                    <th>Externe</th>

                </tr>

                @foreach($results as $meal)

                    <tr>
                        <td>{{ $meal['name'] }}</td>
                        <td>{{  $meal['preis_intern'] }}</td>
                        <td>{{ $meal['preis_extern'] }}</td>
                    </tr>

                @endforeach



                {{--<?php foreach($results as $meal) : ?>
                <tr>
                    <td><?php echo $meal['name']?><sub> <?php echo $meal['allergene'] ?></sub></td>
                    <td><?php echo showPrice($meal['preis_intern']); ?></td>
                    <td><?php echo showPrice($meal['preis_extern']); ?></td>
                </tr>

                <?php endforeach;  ?>--}}



            </table>
        </section>

        <section class="col-3">
            <table class="flex-table">
                <tr>
                    <th>Allergen</th>
                    <th>Code</th>
                    <th>Typ</th>
                </tr>

                {{--<?php include "allergene.php"?>
                <?php foreach($allergensCon as $allerg) : ?>
                <tr>
                    <td><?php echo $allerg['name']; ?></td>
                    <td><?php echo $allerg['code']; ?></td>
                    <td><?php echo $allerg['typ']; ?></td>
                </tr>

                <?php endforeach; ?>--}}


            </table>



        </section>


        <h2 id="zahlen">E-Mensa im Zahlen</h2>
        <section class="col-3">
            <div>
                <p class="section-highlight">10</p>
                <p class="section-subtext">Besuche</p>
            </div>
            <div>
                <p class="section-highlight">20</p>
                <p class="section-subtext">Anmeldungen zum Newsletter</p>
            </div>
            <div>
                <p class="section-highlight">30</p>
                <p class="section-subtext">Speisen</p>
            </div>
        </section>


        <h2 id="kontakt" >Interesse geweckt, Wir informieren Sie</h2>
        <section>

            <x-newsletter />

        </section>

        <h2 id="wichtig">Das ist uns wichtig</h2>
        <section class="col-3">
            <div>
                <img src="images/apple.png" alt="apple icon" width="50px" class="center">
                <p class="section-subtext">Frische Zutaten</p>
            </div>
            <div>
                <img src="images/bowl.png" alt="bowl icon" width="50px" class="center">
                <p class="section-subtext">Ausgewogenen Gerichte</p>
            </div>
            <div>
                <img src="images/mask.png" alt="mask icon" width="50px" class="center">
                <p class="section-subtext">Sauberkeit</p>
            </div>
        </section>


        <h3 id="greetings">Wir freuen uns auf Ihren Besuch</h3>

    </div>

@endsection

@section('footer')

    @include('includes.default_footer')

@endsection
