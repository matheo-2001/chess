<?php

namespace Chess;

use Exception;

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
        try{
            if((int)$position[1] > 0 && (int)$position[1] < 9){
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
                echo "\n";
            }else{
                throw new Exception('Position non valide');
            }}catch(Exception $e){
            echo("Mettre une position valide \n");
        }
    }
}