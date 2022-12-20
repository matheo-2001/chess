<?php 


namespace Chess;

spl_autoload_register(function ($class) {
    $class = str_replace("\\", "/", $class . '.php');
    require_once $class;
});

$piece = new Tour('F3');
$position = $piece->position;
$xy = $piece->getGamePosition($position);
$piece->show($position, $xy);

// $piece = new Roi('C3');
// $position = $piece->position;
// $xy = $piece->getGamePosition($position);
// $piece->show($position, $xy);

// $piece = new Reine('C3');
// $position = $piece->position;
// $xy = $piece->getGamePosition($position);
// $piece->show($position, $xy);

// $piece = new Pion('C3');
// $position = $piece->position;
// $xy = $piece->getGamePosition($position);
// $piece->show($position, $xy);

// $piece = new Fou('C3');
// $position = $piece->position;
// $xy = $piece->getGamePosition($position);
// $piece->show($position, $xy);

// $piece = new Cavalier('C3');
// $position = $piece->position;
// $xy = $piece->getGamePosition($position);
// $piece->show($position, $xy);