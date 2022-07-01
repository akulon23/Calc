<?php

use Application\Engine;

// Pobranie i zapisanie sciezki projektu.
const PROJECT_DIR = __DIR__ . '/..';

require PROJECT_DIR . "/vendor/autoload.php";

$engine = new Engine();
$engine->start();

