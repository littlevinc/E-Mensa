<?php
/**
 * Praktikum DBWT. Autoren:
 * Luke, Braun, 3551708
 * Kai , Fedin, 3515541
 */

include ("meals.php");
include ("website_stats.php");
include ("visitor_log.php")

?>


<!DOCTYPE html>
<!--
- Praktikum DBWT. Autoren:
- Luke, Braun, 3551708
- Kai , Fedin, 3541708
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        <?php  include ("style.css"); ?>
    </style>
    <link rel="stylesheet" href="https://use.typekit.net/qxh4wpt.css">
    <title>E-Mensa</title>
</head>
<body>

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
  <div>

  </div>
</nav>
<header>
  <img src="img/homepage-header.webp" alt="homepage header mensa" width = "50%">
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
        <?php foreach($results as $meal) : ?>
            <tr>
                <td><?php echo $meal['name']?><sub> <?php echo $meal['allergene'] ?></sub></td>
                <td><?php echo showPrice($meal['preis_intern']); ?></td>
                <td><?php echo showPrice($meal['preis_extern']); ?></td>
            </tr>

        <?php endforeach;  ?>
    </table>
  </section>

    <section>
        <table class="flex-table">
            <tr>
                <th>Allergen</th>
                <th>Code</th>
                <th>Typ</th>
            </tr>
            <?php include "allergene.php"?>
            <?php foreach($allergensCon as $allerg) : ?>
                <tr>
                    <td><?php echo $allerg['name']; ?></td>
                    <td><?php echo $allerg['code']; ?></td>
                    <td><?php echo $allerg['typ']; ?></td>
                </tr>

            <?php endforeach; ?>


        </table>



    </section>


  <h2 id="zahlen">E-Mensa im Zahlen</h2>
  <section class="col-3">
    <div>
      <p class="section-highlight"><?php databaseUserCount(); ?></p>
      <p class="section-subtext">Besuche</p>
    </div>
    <div>
      <p class="section-highlight"><?php echo getNewsletterAnmeldungen(); ?></p>
      <p class="section-subtext">Anmeldungen zum Newsletter</p>
    </div>
    <div>
      <p class="section-highlight"><?php echo getNumberGerichte() ?></p>
      <p class="section-subtext">Speisen</p>
    </div>
  </section>


  <h2 id="kontakt" >Interesse geweckt, Wir informieren Sie</h2>
  <section>
    <?php include ("newsletter.php");?>
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


  <h3 id="greetings">Wir freuen uns auf Ihren Besuch</h3>
    <?php databaseUserCount(); ?>


</div>



<footer>
  <ul>
    <li>(c) E-Mensa GmbH</li>
    <li>Luke & Kai</li>
    <li><a href="/impressum.html">Impressum</a></li>
  </ul>

</footer>

</body>
</html>