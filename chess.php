<?php

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

class Grille {

    public $w;

    public function __construct()
    {
        $this->w = 8;
    }
}

class Pion extends Pieces {
    
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

class Tour extends Pieces
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

class Fou extends Pieces
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
                $an[($na[$x] + $value)] . ($y + $value) => $an[($na[$x] + $value)] . ($y + $value),
                $an[($na[$x] - $value)] . ($y - $value) => $an[($na[$x] - $value)] . ($y - $value),
                $an[($na[$x] + $value)] . ($y - $value) => $an[($na[$x] + $value)] . ($y - $value),
                $an[($na[$x] - $value)] . ($y + $value) => $an[($na[$x] - $value)] . ($y + $value),
            ];
            $value++;
            // Fusionne
            $array = array_merge($array, $result);
        } 
        // Retourne le tableau
        return $array;
    }

        
}

class Reine extends Pieces
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
                $an[($na[$x] + $value)] . ($y + $value) => $an[($na[$x] + $value)] . ($y + $value),
                $an[($na[$x] - $value)] . ($y - $value) => $an[($na[$x] - $value)] . ($y - $value),
                $an[($na[$x] + $value)] . ($y - $value) => $an[($na[$x] + $value)] . ($y - $value),
                $an[($na[$x] - $value)] . ($y + $value) => $an[($na[$x] - $value)] . ($y + $value),
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

class Roi extends Pieces
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
            $an[($na[$x] + 1)] . ($y + 1) => $an[($na[$x] + 1)] . ($y + 1),
            $an[($na[$x] - 1)] . ($y - 1) => $an[($na[$x] - 1)] . ($y - 1),
            $an[($na[$x] + 1)] . ($y - 1) => $an[($na[$x] + 1)] . ($y - 1),
            $an[($na[$x] - 1)] . ($y + 1) => $an[($na[$x] - 1)] . ($y + 1),
            $an[($na[$x] + 1)] . $y => $an[($na[$x] + 1)] . $y,
            $an[($na[$x] - 1)] . $y => $an[($na[$x] - 1)] . $y,
            $an[$na[$x]] . ($y + 1) => $an[($na[$x] + 1)] . ($y + 1),
            $an[$na[$x]] . ($y - 1) => $an[($na[$x] - 1)] . ($y - 1),
            ];
            
            $value++;
            // Fusionne
            $array = array_merge($array, $result);
        }
        // Retourne le tableau
        return $array;
    }
    

}


$piece = new Cavalier('C3');
$position = $piece->position;
$xy = $piece->getGamePosition($position);
$piece->show($position, $xy);

// $piece = new Tour('C3');
// $position = $piece->position;
// $xy = $piece->getGamePosition($position);
// $piece->show($position, $xy);

// $piece = new Fou('C3');
// $position = $piece->position;
// $xy = $piece->getGamePosition($position);
// $piece->show($position, $xy);

// $piece = new Reine('C3');
// $position = $piece->position;
// $xy = $piece->getGamePosition($position);
// $piece->show($position, $xy);

// $piece = new Roi('C3');
// $position = $piece->position;
// $xy = $piece->getGamePosition($position);
// $piece->show($position, $xy);
