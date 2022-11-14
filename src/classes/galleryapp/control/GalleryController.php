<?php

namespace MediaPhoto\galleryapp\control;

use MediaPhoto\galleryapp\model\Gallery;
use MediaPhoto\galleryapp\view\GalleryView;
use MediaPhoto\mf\control\AbstractController;
use MediaPhoto\mf\view\AbstractView;

class GalleryController extends AbstractController
{

    public function execute(): void
    {
        AbstractView::addStyleSheet('html/css/Gallery.css');
        $idGallery = $this->request->get['id'];

        $gallery = Gallery::where('id', '=', $idGallery)->first();

        $images = $gallery->images()->get();

        $GalleryView = new GalleryView($images);

        $GalleryView->makePage();
    }
}
