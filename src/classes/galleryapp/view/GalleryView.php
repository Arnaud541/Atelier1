<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\mf\view\Renderer;
use MediaPhoto\galleryapp\view\MediaPhotoView;

class GalleryView extends MediaPhotoView implements Renderer
{
    public function render(): string
    {

        $images = $this->data;
        $galleryName = $images[0]->gallery()->first()->name;



        $content = "<div>
                        <h2>$galleryName</h2>
                        <div>
                    ";
        if (count($images) == 0) {
            $content .= "<h1>Aucune image dans la galerie</h1>";
        } else {

            foreach ($images as $image) {
                $content .= "<div><img alt={$image->title} src={$image->path}></div>";
            }
            $content .= "</div></div>";
        }

        return $content;
    }
}
