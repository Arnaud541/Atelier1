<?php

namespace MediaPhoto\galleryapp\control;

use MediaPhoto\mf\router\Router;
use MediaPhoto\mf\view\Renderer;
use MediaPhoto\galleryapp\model\Image;
use MediaPhoto\galleryapp\model\Gallery;
use MediaPhoto\mf\control\AbstractController;
use MediaPhoto\galleryapp\view\EditGalleryView;

class DeletImageController extends AbstractController{
    

    public function execute():void{


        $image = Image::select()->where('id', '=', $this->request->get['id'])->first();


        $gallery = Gallery::where('id', '=', $image->id_gallery)->first();


        $image->delete();
        $images = $gallery->images()->get();
        $GalleryView = new EditGalleryView($images);
        $GalleryView->makePage();
    }
}