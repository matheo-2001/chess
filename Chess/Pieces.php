<?php

namespace Chess;

interface PositionGame {
    public function getGamePosition($position);
}

class Pieces {

    public $grille;
    public $position;
    
    public function __construct($position)
    {
        $this->position = $position;
    }

    public function getPosition() { return $this->position; }

    public function setPosition($position) { $this->position = $position; }

    public function show($position, $positionP)
    {
        
        $alpha = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
        echo "  A  B  C  D  E  F  G  H" . PHP_EOL;
        // Convertit une chaîne en tableau 
        $position = str_split($position);
        for ($i = 1; $i <= 8; $i++) {
            echo $i;
            foreach ($alpha as $lettre) {
                if ($position[1] == $i) {
                    if ($position[0] === $lettre) {
                        echo ' O ';
                    } elseif ($positionP[$lettre . $i] ?? null) {
                        echo ' X ';
                    } else {
                        echo " - ";
                    }
                } elseif ($positionP[$lettre . $i] ?? null) {
                    echo ' X ';
                } else {
                    echo " - ";
                }
            }
            echo PHP_EOL;
        }
    }
}