<?php

namespace MediaPhoto\galleryapp\control;

use MediaPhoto\galleryapp\model\Gallery;
use MediaPhoto\galleryapp\view\GalleryView;
use MediaPhoto\mf\control\AbstractController;

class GalleryController extends AbstractController
{

    public function execute(): void
    {
        $idGallery = $this->request->get['idGallery'];

        $gallery = Gallery::where('id', '=', $idGallery);

        $images = $gallery->images()->get();

        $GalleryView = new GalleryView($images);

        $GalleryView->makePage();
    }
}
