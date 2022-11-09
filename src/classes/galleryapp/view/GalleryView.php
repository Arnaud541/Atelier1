<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\mf\view\Renderer;
use MediaPhoto\galleryapp\view\MediaPhotoView;

class GalleryView extends MediaPhotoView implements Renderer
{
    public function render(): string
    {

        $images = $this->data;

        $content = "<div>
                        <h1>Titre de la galerie</h1>
                        <div>
                    ";
        foreach ($images as $image) {
            $content .= "<div><img alt='$image->title' src='$image->path'></div>";
        }

        $content .= "</div></div>";

        return $content;
    }
}
