<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\galleryapp\view\MediaPhotoView;
use MediaPhoto\mf\view\Renderer;

class ImageView extends MediaPhotoView implements Renderer
{
    public function render(): string
    {
        $image = $this->data;

        
    }
}
