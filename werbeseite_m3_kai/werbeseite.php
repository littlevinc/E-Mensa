<?php
/**
 * Praktikum DBWT. Autoren:
 * Luke, Braun, 3551708
 * Kai , Fedin, 3515541
 */

include ("meals.php");

function countSignups(): int{
    /*
    $file="largefile.txt";
    $linecount = 0;
    $handle = fopen($file, "r");
    while(!feof($handle)){
        $line = fgets($handle);
        $linecount = $linecount + substr_count($line, PHP_EOL);
    }

    fclose($handle);
    return $linecount;

    */
    return count(file("newsletter_signup.txt"));
}


$link = mysqli_connect("localhost", "root", "root", "emensawerbeseite");

if(!$link){
    echo "Connection failed" , mysqli_connect_error();
}

$sql = "INSERT INTO besucher VALUES();";

$result = mysqli_query($link, $sql);

$sql = "SELECT g.name AS name, g.preis_intern AS preis_intern, g.preis_extern AS preis_extern, GROUP_CONCAT(ga.code) AS allergene
FROM gericht g JOIN gericht_hat_allergen ga ON g.id = ga.gericht_id GROUP BY g.name LIMIT 5;";

$resultMeals = mysqli_query($link, $sql);
if(!$resultMeals) {
    echo "Feher in der query" . mysqli_error($link);
}


$sql = "SELECT COUNT(id) AS visitorcount FROM besucher;";
$resultvisiterCount = mysqli_query($link, $sql);
$visitorCount[] = mysqli_fetch_assoc($resultvisiterCount);


$sql = "SELECT COUNT(id) AS mealcount FROM gericht;";
$resultmealCount = mysqli_query($link, $sql);
$mealCount[] = mysqli_fetch_assoc($resultmealCount);


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
        <th>Allergene</th>
      </tr>
        <?php

        while($row = mysqli_fetch_assoc($resultMeals)){
            echo "<tr> <td>{$row['name']}</td>";
            echo "<td>" . showPrice($row['preis_intern']) . "</td>";
            echo "<td>" . showPrice($row['preis_extern']) . "</td>";
            echo "<td>{$row['allergene']}</td></tr>";
        }

        /**
        foreach($meals as $meal) echo "<tr>
                    <td>{$meal['name']}</td>
                    <td>" . showPrice($meal['price_intern']) . "</td>
                    <td> " . showPrice($meal['price_extern']) . "</td>
                    <td class='disalbe_padding'><img src='{$meal['img']}'></td>
                  </tr>";
         **/
        ?>
    </table>
  </section>
  <h2 id="zahlen">E-Mensa im Zahlen</h2>
  <section class="col-3">
    <div>

      <p class="section-highlight"><?php echo $visitorCount[0]['visitorcount'] ?></p>
      <p class="section-subtext">Besuche</p>
    </div>
    <div>
      <p class="section-highlight"><?php  echo countSignups(); ?></p>
      <p class="section-subtext">Anmeldungen zum Newsletter</p>
    </div>
    <div>
      <p class="section-highlight"><?php echo $mealCount[0]['mealcount'] ?></p>
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

<?php

mysqli_free_result($resultMeals);
mysqli_free_result($resultvisiterCount);
mysqli_free_result($resultmealCount);
mysqli_close($link);

?>