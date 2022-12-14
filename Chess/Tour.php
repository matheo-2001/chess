<?php
namespace Chess;

require_once ("index.php");

class Tour extends Pieces implements PositionGame
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

        // Parcourir les 8 indices que je donne comme alias value dans le tableau. 
        // J’implémente après chaque foreach ma value en faisant $value++; ce qui me permet ensuite de faire mes calculs.
        $array = array();
        foreach ($na as $value) {
            $result = [
                $x . $value => $x . $value,
                $an[($na[$x] + $value)] . $y => $an[($na[$x] + $value)] . $y,
                $an[($na[$x] - $value)] . $y => $an[($na[$x] - $value)] . $y,
            ];

            $value++;
            // Fusionne 
            $array = array_merge($array, $result);
        }
        // Retourne le tableau
        return $array;
    }
}

