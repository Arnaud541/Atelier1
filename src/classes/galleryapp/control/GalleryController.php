<?php

namespace MediaPhoto\galleryapp\control;

use MediaPhoto\galleryapp\model\Gallery;
use MediaPhoto\galleryapp\view\GalleryView;
use MediaPhoto\mf\control\AbstractController;

class GalleryController extends AbstractController
{

    public function execute(): void
    {
        if (isset($this->request->get['id'])) {
            $_SESSION['idGallery'] = $this->request->get['id'];
        }

        $gallery = Gallery::where('id', '=', $_SESSION['idGallery'])->first();
        $images = $gallery->images()->get();
        $GalleryView = new GalleryView($images);
        $GalleryView->makePage();
    }
}
