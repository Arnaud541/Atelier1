<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\galleryapp\view\MediaPhotoView;
use MediaPhoto\mf\view\Renderer;

class ImageView extends MediaPhotoView implements Renderer
{
    public function render(): string
    {
        $image = $this->data;
        $html = "";

        $html = "<div id='photo'>
                    <h1>$image->title</h1>
                    <img src='$image->path'>
                    <div>$image->descript</div>
                </div>";


        return $html;
    }
}
