<?php

ini_set('display_errors', 1);

require_once('vendor/autoload.php');

use Faker\Factory;
use Illuminate\Database\Capsule\Manager;

$data = parse_ini_file("config/config.ini");

$db = new Manager();

$db->addConnection($data); /* configuration avec nos paramètres */
$db->setAsGlobal();            /* rendre la connexion visible dans tout le projet */
$db->bootEloquent(); /* établir la connexion */

$faker = Factory::create('fr_FR');
