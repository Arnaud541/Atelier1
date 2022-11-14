<?php

namespace MediaPhoto\galleryapp\control;

use MediaPhoto\mf\router\Router;
use MediaPhoto\galleryapp\model\Tag;
use MediaPhoto\mf\view\AbstractView;
use MediaPhoto\galleryapp\model\User;
use MediaPhoto\galleryapp\model\Gallery;
use MediaPhoto\galleryapp\model\VIPAccess;
use MediaPhoto\mf\control\AbstractController;
use MediaPhoto\galleryapp\view\NewGalleryView;
use MediaPhoto\mf\exceptions\NotExistException;
use MediaPhoto\mf\auth\AbstractAuthentification;

class NewGalleryController extends AbstractController
{

    public function execute(): void
    {
        AbstractView::addStyleSheet('html/css/NewGallery.css');
        switch ($this->request->method) {
            case 'GET':
                $view = new NewGalleryView();
                $view->makePage();
                break;
            case 'POST':
                if (isset($this->request->post['title']) && isset($this->request->post['description']) && isset($this->request->post['tags']) && isset($this->request->post['mode'])) {

                    $gallery = new Gallery();
                    $gallery->id_user = AbstractAuthentification::connectedUser();
                    $gallery->name = filter_var($this->request->post['title'], FILTER_SANITIZE_SPECIAL_CHARS);
                    $gallery->descript = filter_var($this->request->post['description'], FILTER_SANITIZE_SPECIAL_CHARS);
                    $gallery->mode = (int)$this->request->post['mode'];
                    $gallery->save();

                    $_SESSION['idGallery'] = $gallery->id;

                    $tags = filter_var($this->request->post['tags'], FILTER_SANITIZE_SPECIAL_CHARS);
                    $tags = explode(",", $tags);

                    foreach ($tags as $word) {
                        $tag = new Tag();
                        $tag->id_gallery = $gallery->id;
                        $tag->tag = "#" . $word;
                        $tag->save();
                    }

                    if ($this->request->post['mode'] == 1 && isset($this->request->post['users'])) {
                        $usersAccess = filter_var($this->request->post['users'], FILTER_SANITIZE_SPECIAL_CHARS);;
                        $usersAccess = explode(",", $usersAccess);

                        foreach ($usersAccess as $user) {

                            $userAccess = User::select()->where('pseudo', '=', $user)->first();
                            if ($userAccess) {
                                $vipAccess = new VIPAccess();
                                $vipAccess->id_user = $userAccess->id;
                                $vipAccess->id_gallery = $gallery->id;
                                $vipAccess->save();
                            } else {
                                throw new NotExistException("Utilisateur non trouvé.");
                            }
                        }
                    }

                    Router::executeRoute('create_image_view');
                }
                break;
        }
    }
}
