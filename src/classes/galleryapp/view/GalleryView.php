<?php

use MediaPhoto\mf\view\Renderer;
use MediaPhoto\galleryapp\model\MediaPhotoView;

class GalleryView extends MediaPhotoView implements Renderer {
    public function render(): string
    {

        $images = $this->data;

        return "en cours";
        
    }
}