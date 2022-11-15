<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\mf\view\AbstractView;
use MediaPhoto\mf\view\Renderer;
use MediaPhoto\galleryapp\view\MediaPhotoView;

class AboutView extends MediaPhotoView implements Renderer
{
    public function render():string
    {
        return '<div><a href="https://github.com/Arnaud541/Atelier1">https://github.com/Arnaud541/Atelier1</a></div>';
    }
}