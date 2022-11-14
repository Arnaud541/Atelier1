<?php

namespace MediaPhoto\galleryapp\control;

use MediaPhoto\galleryapp\model\Image;
use MediaPhoto\galleryapp\model\Gallery;
use MediaPhoto\mf\control\AbstractController;
use MediaPhoto\galleryapp\view\EditGalleryView;
use MediaPhoto\mf\view\AbstractView;

class DeleteImageController extends AbstractController
{


    public function execute(): void
    {
        // AbstractView::addStyleSheet('html/css/')
        $image = Image::select()->where('id', '=', $this->request->get['id'])->first();
        $gallery = Gallery::where('id', '=', $image->id_gallery)->first();
        $image->delete();

        $images = $gallery->images()->get();
        $GalleryView = new EditGalleryView($images);
        $GalleryView->makePage();
    }
}
