<link href='html/css/MediaPhoto.css' rel='stylesheet'>
<script src="https://kit.fontawesome.com/78c89b2e03.js" crossorigin="anonymous"></script>
<?php
session_start();

ini_set('display_errors', 1);

require_once('vendor/autoload.php');

use MediaPhoto\mf\router\Router;
use MediaPhoto\mf\view\Renderer;
use MediaPhoto\galleryapp\model\Tag;
use MediaPhoto\mf\view\AbstractView;
use MediaPhoto\galleryapp\model\User;
use MediaPhoto\galleryapp\model\Image;
use Illuminate\Database\Capsule\Manager;
use MediaPhoto\galleryapp\model\Gallery;
use MediaPhoto\galleryapp\view\SignupView;
use MediaPhoto\galleryapp\control\HomeController;
use MediaPhoto\galleryapp\control\ImageController;

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

AbstractView::addStyleSheet('html/css/ddMenu.css');

$router = new Router();

$router->addRoute('home_view', 'liste_gallerys', 'MediaPhoto\galleryapp\control\HomeController');
$router->addRoute('gallery_view', 'view_gallery', 'MediaPhoto\galleryapp\control\GalleryController');
$router->addRoute('signup_view', 'signup', 'MediaPhoto\galleryapp\control\SignupController');
$router->addRoute('create_gallery_view', 'new_gallery', 'MediaPhoto\galleryapp\control\NewGalleryController');
$router->addRoute('login_view', 'login', 'MediaPhoto\galleryapp\control\LoginController');
$router->addRoute('logout_view', 'logout', 'MediaPhoto\galleryapp\control\LogoutController');
$router->addRoute('image_view', 'image', 'MediaPhoto\galleryapp\control\ImageController');
//$router->addRoute('about_view', 'about', 'MediaPhoto\galleryapp\control\AboutController');

$router->setDefaultRoute('liste_gallerys');


$router->run();