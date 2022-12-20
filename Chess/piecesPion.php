<?php

namespace Chess;


class Pion extends Pieces implements PositionGame {
    
    public function getGamePosition($position)
    {
        // Convertit une chaîne en tableau 
        $position = str_split($position);
        $x = $position[0];
        $y = $position[1];

        if ($y != 2) {
            return [
                $x . ($y + 1) => $x . ($y + 1)
            ];
        } else {
            return [
                $x . ($y + 1) => $x . ($y + 1),
                $x . ($y + 2) => $x . ($y + 2)
            ];
        }
    }
}