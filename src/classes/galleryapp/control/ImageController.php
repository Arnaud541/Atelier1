<?php

namespace MediaPhoto\galleryapp\control;

use MediaPhoto\galleryapp\model\Image;
use MediaPhoto\galleryapp\model\Gallery;
use MediaPhoto\galleryapp\view\ImageView;
use MediaPhoto\mf\control\AbstractController;

class ImageController extends AbstractController
{

    public function execute(): void
    {
        if (isset($this->request->get['id'])) {


            $image = Image::where('id', "=", $this->request->get['id'])->first();



            $view = new ImageView($image);

            $view->makePage();
        }
    }
}
