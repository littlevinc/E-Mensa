<?php
/**
 * Praktikum DBWT. Autoren:
 * Kai, Fedin, 3515541
 * Luke, Braun, 3541708
 */

$famousMeals = [
    1 => ['name' => 'Currywurst mit Pommes',
        'winner' => [2001, 2003, 2007, 2010, 2020]],
    2 => ['name' => 'Hähnchencrossies mit Paprikareis',
        'winner' => [2002, 2004, 2008]],
    3 => ['name' => 'Spaghetti Bolognese',
        'winner' => [2011, 2012, 2017]],
    4 => ['name' => 'Jägerschnitzel mit Pommes',
        'winner' => 2019]
];

function noWinner($meals) : array{
    $years = [];
    foreach($meals as $meal){
        if(is_array($meal['winner'])){
            foreach($meal['winner'] as $winner){
                $years[] = $winner;
            }
        }else{
            $years[] = $meal['winner'];
        }
    }

    $noWinner = [];
    $curYear = date("Y");
    for($i = 2000; $i < $curYear; $i++){
        if(!(in_array($i, $years))){
            $noWinner[] = $i;
        }
    }

    return $noWinner;

}

?>

<!DOCTYPE html>

<html lang="de">

    <head>
        <title>4 D Array</title>
        <style>

            li{
                margin-top: 5px;
            }

        </style>
    </head>

    <body>

    <ol>
        <?php

            foreach($famousMeals as $meal){
                echo "<li>" . $meal['name'] . "<br>" . "</li>";

                $winner = $meal['winner'];
                if(gettype($winner) === "array"){
                    sort($winner);
                    echo implode(", ", $winner);
                }
                else{
                    echo $winner;
                }

            }

        ?>
    </ol>

    <p>Jahr(e) ohne Gewinner <?php echo implode(", ", noWinner($famousMeals));?></p>
    </body>

</html>
