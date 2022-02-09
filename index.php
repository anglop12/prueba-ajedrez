<?php
/*
En un tablero de ajedrez, pero de 16 casillas por 16 (16x16) se encuentran dos caballos adversarios. 
Ambos caballos están ubicados en esquinas diagonales opuestas por ejemplo 1-1 16-16. 
El algoritmo debe mover ambos caballos por este tablero de forma aleatoria e indefinida hasta que uno de los dos cancele al otro, es decir que caiga en el mismo casillero ocupado por el adversario.

Cada movimiento se ira registrando en un JSON de la siguiente forma.

Pieza:C
Color:B
Posicion_X:1
Posicion_Y:1
*/

function makeMovement($caballo, $movement) {
    // Movimientos
    switch ($movement) {
        case 1:// x + 1 | y + 2
            $caballo['x'] += 1;
            $caballo['y'] += 2;
            break;
        case 2:// x + 2 | y + 1
            $caballo['x'] += 2;
            $caballo['y'] += 1;
            break;
        case 3:// x + 2 | y - 1
            $caballo['x'] += 2;
            $caballo['y'] -= 1;
            break;
        case 4:// x + 1 | y - 2
            $caballo['x'] += 1;
            $caballo['y'] -= 2;
            break;
        case 5:// x - 1 | y - 2
            $caballo['x'] -= 1;
            $caballo['y'] -= 2;
            break;
        case 6:// x - 2 | y - 1
            $caballo['x'] -= 2;
            $caballo['y'] -= 1;
            break;
        case 7:// x - 2 | y + 1
            $caballo['x'] -= 2;
            $caballo['y'] += 1;
            break;
        case 8:// x - 1 | y + 2
            $caballo['x'] -= 1;
            $caballo['y'] += 2;
            break;
    }
    
    return $caballo;
}

function isValidMovement($caballo, $mov) {
    $caballo = makeMovement($caballo, $mov);
    if ($caballo['x'] < 1 or $caballo['y'] < 1 or $caballo['x'] > 16 or $caballo['y'] > 16 ) {
        return false;
    } else {
        return true;
    }
}

function evalMovements($caballo) {
    $movements = [];
    for ($i=1; $i <= 8 ; $i++) { 
        if (isValidMovement($caballo, $i)) {
            array_push($movements, $i);
        }
    }
    return $movements;
}

function move($caballo) {
    $movements = evalMovements($caballo);
    $movement = rand(0, count($movements)-1);
    $caballo = makeMovement($caballo, $movements[$movement]);
    return $caballo;
}

$caballo1 = [
    'pieza' => 'Caballo',
    'color' => 'Blanco',
    'x' => 1,
    'y' => 1,  
];
$caballo2 = [
    'pieza' => 'Caballo',
    'color' => 'Negro',
    'x' => 16,
    'y' => 16,  
];

$win = null;

while (true) {
    $caballo1 = move($caballo1);
    echo "El caballo " . $caballo1['color'] . " a X" . $caballo1['x'] . '|Y' . $caballo1['y'] . '<br>';
    if ($caballo1['x'] == $caballo2['x'] and $caballo1['y'] == $caballo2['y']) {
        $win = $caballo1;
        break;
    }
    $caballo2 = move($caballo2);
    echo "El caballo " . $caballo2['color'] . " a X" . $caballo2['x'] . '|Y' . $caballo2['y'] . '<br>';
    if ($caballo1['x'] == $caballo2['x'] and $caballo1['y'] == $caballo2['y']) {
        $win = $caballo2;
        break;
    }
}

echo "El caballo ganador es: " . $win['color'];