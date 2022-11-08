<?php

require_once('vendor/autoload.php');

$data = parse_ini_file("config/config.ini");

$db = new Illuminate\Database\Capsule\Manager();

$db->addConnection($data); /* configuration avec nos paramètres */
$db->setAsGlobal();            /* rendre la connexion visible dans tout le projet */
$db->bootEloquent(); /* établir la connexion */

$faker = \Faker\Factory::create();

echo $faker->imageUrl("car");