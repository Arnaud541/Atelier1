<?php

namespace MediaPhoto\galleryapp\control;

use MediaPhoto\mf\router\Router;
use MediaPhoto\galleryapp\model\Gallery;
use MediaPhoto\galleryapp\view\GalleryView;
use MediaPhoto\mf\control\AbstractController;
use MediaPhoto\galleryapp\view\EditGalleryView;

class EditGalleryController extends AbstractController
{

    public function execute(): void
    {
        if (isset($this->request->get['id'])) {
            $_SESSION['idGallery'] = $this->request->get['id'];
        }

        $gallery = Gallery::where('id', '=', $_SESSION['idGallery'])->first();
        $images = $gallery->images()->get();

        var_dump($images);

        if ($images->isEmpty()){
            Router::executeRoute("my_gallery_view");
        }

        $this->request->method = 'GET';
        $GalleryView = new EditGalleryView($images);
        $GalleryView->makePage();
    }


}
