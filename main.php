<?php

ini_set('display_errors', 1);

require_once('vendor/autoload.php');

use MediaPhoto\galleryapp\model\Tag;
use MediaPhoto\galleryapp\model\User;
use MediaPhoto\galleryapp\model\Image;
use Illuminate\Database\Capsule\Manager;
use MediaPhoto\galleryapp\model\Gallery;

$data = parse_ini_file("config/config.ini");

$db = new Manager();

$db->addConnection($data); /* configuration avec nos paramètres */
$db->setAsGlobal();            /* rendre la connexion visible dans tout le projet */
$db->bootEloquent(); /* établir la connexion */

// $user = User::where('id', '=', 30)->first();
// $tag = Tag::where('tag', 'like',"#n%")->get();

// foreach($tag as $t){
//     $gallerys = $t->galleryTag()->get();
//     foreach($gallerys as $gallery){
//         echo $gallery->id;
//         echo "<br>";
//     }
// }
