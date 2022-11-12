<?php

namespace MediaPhoto\galleryapp\control;

use MediaPhoto\mf\router\Router;
use MediaPhoto\galleryapp\model\Tag;
use MediaPhoto\galleryapp\model\Gallery;
use MediaPhoto\mf\control\AbstractController;
use MediaPhoto\galleryapp\view\NewGalleryView;
use MediaPhoto\mf\auth\AbstractAuthentification;
use MediaPhoto\mf\view\AbstractView;

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
                    $gallery->name = $this->request->post['title'];
                    $gallery->descript = $this->request->post['description'];
                    $gallery->mode = (int)$this->request->post['mode'];
                    $gallery->save();

                    $_SESSION['idGallery'] = $gallery->id;

                    $tags = $this->request->post['tags'];
                    $tags = explode(",", $tags);

                    foreach ($tags as $word) {
                        $tag = new Tag();
                        $tag->id_gallery = $gallery->id;
                        $tag->tag = "#" . $word;
                        $tag->save();
                    }

                    Router::executeRoute('create_image_view');
                }
                break;
        }
    }
}
