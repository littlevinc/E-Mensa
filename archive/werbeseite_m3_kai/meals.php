<?php

$meals = [
    [   'name' => 'Rindfleich mit Bambus, Kaiserschoten und rotem Paprika, dazu Mie Nudeln',
        'price_intern' => 2.6,
        'price_extern' => 3.2,
        'img' => 'img/miu-noodles.jpg'],
    [   'name' => 'Spinatrisotto mit kleinen Samosateigecken und gemischter Salat',
        'price_intern' => 2.2,
        'price_extern' => 3.0,
        'img' => 'img/risotto.jpg'
    ],
    [   'name' => 'Gebratene Kichererbsen und Auberginen mit griechischem Johurt und Tomaten',
        'price_intern' => 2.0,
        'price_extern' => 2.8,
        'img' => 'img/kichererbsen.jpg'
    ],
    [   'name' => 'Bowl mit Salat, gebratenem Hähnchen und Ei',
        'price_intern' => 2.4,
        'price_extern' => 3.0,
        'img' => 'img/chicken-bowl.jpg'
    ]
];


function showPrice( $price): string{
    $price = number_format((float)$price, 2, ',');
    return ($price . "€");
}


