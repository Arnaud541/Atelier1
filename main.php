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

AbstractView::addStyleSheet('html/css/MediaPhoto.css');

$router = new Router();

$router->addRoute('home_view', 'liste_gallerys', 'MediaPhoto\galleryapp\control\HomeController');
$router->addRoute('gallery_view', 'view_gallery', 'MediaPhoto\galleryapp\control\GalleryController');
$router->addRoute('signup_view', 'signup', 'MediaPhoto\galleryapp\control\SignupController');
$router->addRoute('create_gallery_view', 'new_gallery', 'MediaPhoto\galleryapp\control\NewGalleryController');
$router->addRoute('login_view', 'login', 'MediaPhoto\galleryapp\control\LoginController');
$router->addRoute('logout_view', 'logout', 'MediaPhoto\galleryapp\control\LogoutController');
$router->addRoute('create_image_view', 'new_image', 'MediaPhoto\galleryapp\control\NewImageController');
$router->addRoute('image_view', 'image', 'MediaPhoto\galleryapp\control\ImageController');
$router->addRoute('edit_gallery_view', 'edit_gallery_view', 'MediaPhoto\galleryapp\control\EditGalleryController');
$router->addRoute('my_gallery_view', 'view_my_gallery', 'MediaPhoto\galleryapp\control\MyGalleryController');
$router->addRoute('delete_image_view', 'delete_image', 'MediaPhoto\galleryapp\control\DeleteImageController');
$router->addRoute('edit_gallery_information_view', 'edit_gallery_information', 'MediaPhoto\galleryapp\control\EditGalleryInformationController');
$router->addRoute('about_view', 'about', 'MediaPhoto\galleryapp\control\AboutController');

$router->setDefaultRoute('liste_gallerys');

$router->run();


// $repo = opendir("images/");

// $gallery_id =  Gallery::select('id')->get()->toArray();

//$images = Image::select()->get();


// foreach($images as $image){
//     echo $image->id;
//     echo "<br>";
// }


// $repo = opendir("html/images/");


//     foreach($images as $image){
//         $entry = @readdir($repo);
//         if ($entry != '.' && $entry != '..'){
//             $image->path = "./html/images/".$entry;
//             $image->save();
//         }
//     }


// for ($i = 0; $i < 80; $i++){
//     $image = new Image();
//     $image->title = 'dolor';
//     $image->descript = 'Quisquam quae suscipit et tenetur et est officia';
//     $image->save();
// }