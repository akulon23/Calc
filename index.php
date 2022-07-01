<?php
use Application\Engine;
require __DIR__ . "/vendor/autoload.php";

const PROJECT_DIR = __DIR__;

$engine = new Engine();
$engine->start();

