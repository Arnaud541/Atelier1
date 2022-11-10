<?php

namespace MediaPhoto\galleryapp\control;

use MediaPhoto\galleryapp\model\Image;
use MediaPhoto\galleryapp\model\Gallery;
use MediaPhoto\mf\control\AbstractController;
use MediaPhoto\galleryapp\view\NewGalleryView;
use MediaPhoto\mf\auth\AbstractAuthentification;

class NewGalleryController extends AbstractController
{


    public function execute(): void
    {

        switch ($this->request->method) {
            case 'GET':
                $view = new NewGalleryView();
                $view->makePage();
            case 'POST':
                $gallery = new Gallery();
                $gallery->id_user = AbstractAuthentification::connectedUser();
                $gallery->save();
                if (isset($this->request->post['name']) && isset($this->request->post['name']) && isset($this->request->post['path']) && isset($this->request->post['description'])) {
                    $image = new Image();
                    $image->name = $this->request->post['name'];
                    $image->title = $this->request->post['name'];
                    $image->descript = $this->request->post['description'];
                    $image->id_gallery = $gallery->id;
                    $image->save();
                }
        }
    }
}
