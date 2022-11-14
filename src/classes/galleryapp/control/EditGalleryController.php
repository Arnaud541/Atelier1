<?php

namespace MediaPhoto\galleryapp\control;

use MediaPhoto\mf\router\Router;
use MediaPhoto\galleryapp\model\Gallery;
use MediaPhoto\mf\control\AbstractController;
use MediaPhoto\galleryapp\view\EditGalleryView;
use MediaPhoto\mf\view\AbstractView;

class EditGalleryController extends AbstractController
{

    public function execute(): void
    {
        AbstractView::addStyleSheet('html/css/EditGallery.css');
        if (isset($this->request->get['id'])) {
            $_SESSION['idGallery'] = $this->request->get['id'];
        }

        $gallery = Gallery::where('id', '=', $_SESSION['idGallery'])->first();
        $images = $gallery->images()->get();


        if ($images->isEmpty()) {
            Router::executeRoute("my_gallery_view");
        }

        $GalleryView = new EditGalleryView($images);
        $GalleryView->makePage();
    }
}
