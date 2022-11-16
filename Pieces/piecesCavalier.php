<?php

require_once ('Pieces/piecesPieces.php');
require_once ('Pieces/piecesGrille.php');


class Cavalier extends Pieces
{
    public function getGamePosition($position)
    {
        // Convertit une chaîne en tableau 
        $position = str_split($position);
        $x = $position[0];
        $y = $position[1];

        // Lettre en nombre
        $an = [
            1 => 'A',
            2 => 'B',
            3 => 'C',
            4 => 'D',
            5 => 'E',
            6 => 'F',
            7 => 'G',
            8 => 'H',
        ];

        // Nombre en lettre
        $na = [
            'A' => 1,
            'B' => 2,
            'C' => 3,
            'D' => 4,
            'E' => 5,
            'F' => 6,
            'G' => 7,
            'H' => 8,
        ];

    
        
        // Retourne des positions possible pour le cavalier
        return [
            $an[($na[$x] + 1)] . ($y + 2) => $an[($na[$x] + 1)] . ($y + 2),
            $an[($na[$x] - 1)] . ($y + 2) => $an[($na[$x] - 1)] . ($y + 2),
            $an[($na[$x] + 1)] . ($y - 2) => $an[($na[$x] + 1)] . ($y - 2),
            $an[($na[$x] - 1)] . ($y - 2) => $an[($na[$x] - 1)] . ($y - 2),
            $an[($na[$x] + 2)] . ($y + 1) => $an[($na[$x] + 2)] . ($y + 1),
            $an[($na[$x] - 2)] . ($y - 1) => $an[($na[$x] - 2)] . ($y - 1),
            $an[($na[$x] - 2)] . ($y + 1) => $an[($na[$x] - 2)] . ($y + 1),
            $an[($na[$x] + 2)] . ($y - 1) => $an[($na[$x] + 2)] . ($y - 1),
        ];
    }
}

$piece = new Cavalier('C3');
$position = $piece->position;
$xy = $piece->getGamePosition($position);
$piece->show($position, $xy);