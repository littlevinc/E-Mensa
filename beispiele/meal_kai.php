<?php
/**
 * Praktikum DBWT. Autoren:
 * Kai, Fedin, 3515541
 * Luke, Braun, 3541708
 */
const GET_PARAM_MIN_STARS = 'search_min_stars';
const GET_PARAM_SEARCH_TEXT = 'search_text';
const GET_PARAM_SHOW_DES ='show_description';
const GET_PARAM_LANG = 'sprache';
const GET_PARAM_STARTS_EXT = 'stars_ext';

/**
 *  Sprache
 */
$eng =[
    "Gericht" => "Meal",
    "Bewertungen" => "Reviews",
    "Insgesamt" => "Total",
    "Suchen" => "Search",
    "Filter" => "Filter",
    "Text" => "Text",
    "Sterne" => "Stars",
    "Autor" => "Author"
];

$de =[
    "Gericht" => "Gericht",
    "Bewertungen" => "Bewertungen",
    "Insgesamt" => "Insgesamt",
    "Suchen" => "Suchen",
    "Filter" => "Filter",
    "Text" => "Text",
    "Sterne" => "Sterne",
    "Autor" => "Autor"
];

/**
 * List of all allergens.
 */
$allergens = [
    11 => 'Gluten',
    12 => 'Krebstiere',
    13 => 'Eier',
    14 => 'Fisch',
    17 => 'Milch'
];

$meal = [
    'name' => 'Süßkartoffeltaschen mit Frischkäse und Kräutern gefüllt',
    'description' => 'Die Süßkartoffeln werden vorsichtig aufgeschnitten und der Frischkäse eingefüllt.',
    'price_intern' => 2.90,
    'price_extern' => 3.90,
    'allergens' => [11, 13],
    'amount' => 42             // Number of available meals
];

$ratings = [
    [   'text' => 'Die Kartoffel ist einfach klasse. Nur die Fischstäbchen schmecken nach Käse. ',
        'author' => 'Ute U.',
        'stars' => 2 ],
    [   'text' => 'Sehr gut. Immer wieder gerne',
        'author' => 'Gustav G.',
        'stars' => 4 ],
    [   'text' => 'Der Klassiker für den Wochenstart. Frisch wie immer',
        'author' => 'Renate R.',
        'stars' => 4 ],
    [   'text' => 'Kartoffel ist gut. Das Grüne ist mir suspekt.',
        'author' => 'Marta M.',
        'stars' => 3 ]
];

if (empty($_GET[GET_PARAM_SEARCH_TEXT])){
    echo "empty text";
}

$showRatings = [];
if (!empty($_GET[GET_PARAM_SEARCH_TEXT])) {
    $searchTerm = $_GET[GET_PARAM_SEARCH_TEXT];
    foreach ($ratings as $rating) {
        if (stripos($rating['text'], $searchTerm) !== false) {
            $showRatings[] = $rating;
        }
    }
} else if (!empty($_GET[GET_PARAM_MIN_STARS])) {
    $minStars = $_GET[GET_PARAM_MIN_STARS];
    foreach ($ratings as $rating) {
        if ($rating['stars'] >= $minStars) {
            $showRatings[] = $rating;
        }
    }
}else if(!empty($_GET[GET_PARAM_STARTS_EXT]) && ( $_GET[GET_PARAM_STARTS_EXT] == "TOP" || $_GET[GET_PARAM_STARTS_EXT] == "FLOPP" )){

    if($_GET[GET_PARAM_STARTS_EXT] =="TOP"){

        $toprating = 0;
        foreach($ratings as $rating){
            if($rating['stars'] > $toprating){
                $toprating = $rating['stars'];
            }
        }

        foreach($ratings as $rating){
            if($rating['stars'] == $toprating){
                $showRatings[] = $rating;
            }
        }

    }
    else{
        $lowrating = PHP_INT_MAX;
        foreach($ratings as $rating){
            if($rating['stars'] < $lowrating){
                $lowrating = $rating['stars'];
            }
        }

        foreach($ratings as $rating){
            if($rating['stars'] == $lowrating){
                $showRatings[] = $rating;
            }
        }

    }


}else {
    $showRatings = $ratings;
}

$lang = "de";
if(!empty($_GET[GET_PARAM_LANG])){
    if($_GET[GET_PARAM_LANG] == "eng"){
        $lang = "eng";
    }
}

if($lang == "eng"){
    $langArr = $eng;
}
else{
    $langArr = $de;
}

function calcMeanStars(array $ratings): float{
    $sum = 0;
    foreach ($ratings as $rating) {
        $sum += $rating['stars'] / count($ratings);
    }
    return $sum;
}

function showPrice( $price): string{
    $price = number_format((float)$price, 2, ',');
    return ($price . "€");
}

?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8"/>
        <title>Gericht: <?php echo $meal['name']; ?></title>
        <style>
            * {
                font-family: Arial, serif;
            }
            .rating {
                color: darkgray;
            }
        </style>
    </head>
    <body>
    <a href="?sprache=eng" >English</a>
    <a href="?sprache=de" >Deutsch</a>
        <h1><?php echo $langArr['Gericht'] . ": " . $meal['name']; ?></h1>
        <p><?php if(!isset($_GET[GET_PARAM_SHOW_DES]) || $_GET[GET_PARAM_SHOW_DES] != "0" ){
                echo "{$meal['description']} <br>";}
             ?></p>
    <p>Preis Intern: <?php echo showPrice($meal['price_intern'])  ?> Preis extern: <?php echo showPrice($meal['price_extern'])  ?> </p>
    <p>Allergene:</p>
        <ul>
            <?php
                foreach($meal['allergens'] as $allergen){
                    echo "<li>{$allergen}</li>";
                }
            ?>
        </ul>
        <h1><?php echo " {$langArr['Bewertungen']} ({$langArr['Insgesamt']}: " . calcMeanStars($ratings); ?>)</h1>
        <form method="get">
            <label for="search_text"><?php echo $langArr["Filter"]?>:</label>
            <input id="search_text" type="text" name="search_text"
                   value="<?php
                   if(!empty($_GET[GET_PARAM_SEARCH_TEXT])) {
                       echo htmlspecialchars($searchTerm);} ?>">
            <input type="submit" value="<?php echo $langArr["Suchen"];?>">
        </form>
        <table class="rating">
            <thead>
            <tr>
                <td><?php echo $langArr['Text']?></td>
                <td><?php echo $langArr['Sterne']?></td>
                <td><?php echo $langArr['Autor']?></td>
            </tr>
            </thead>
            <tbody>
            <?php
        foreach ($showRatings as $rating) {
            echo "<tr><td class='rating_text'>{$rating['text']}</td>
                      <td class='rating_stars'>{$rating['stars']}</td>
                      <td class='rating-author'>{$rating['author']}</td>
                  </tr>";
        }
        ?>
            </tbody>
        </table>
    </body>
</html>