# prueba-ajedrez
/*
En un tablero de ajedrez, pero de 16 casillas por 16 (16x16) se encuentran dos caballos adversarios. 
Ambos caballos están ubicados en esquinas diagonales opuestas por ejemplo 1-1 16-16. 
El algoritmo debe mover ambos caballos por este tablero de forma aleatoria e indefinida hasta que uno de los dos cancele al otro, es decir que caiga en el mismo casillero ocupado por el adversario.

Cada movimiento se ira registrando en un JSON de la siguiente forma.

Pieza:C
Color:B
Posicion_X:1
Posicion_Y:1

Movimientos:
1: x + 1 | y + 2
2: x + 2 | y + 1
3: x + 2 | y - 1
4: x + 1 | y - 2
5: x - 1 | y - 2
6: x - 2 | y - 1
7: x - 2 | y + 1
8: x - 1 | y + 2
*/
