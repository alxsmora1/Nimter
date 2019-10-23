<?php
require __DIR__ . "./../vendor/autoload.php";
require __DIR__ . "./../autoload.php";

//Carga la configuracion del framework
$dotenv = \Dotenv\Dotenv::create(__DIR__ . "./../../");
$dotenv->load();