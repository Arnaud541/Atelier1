<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\mf\view\Renderer;
use MediaPhoto\galleryapp\view\MediaPhotoView;

class MyGalleryView extends MediaPhotoView implements Renderer
{
    public function render(): string
    {

        $gallerys = $this->data;
        $html = "";

        foreach($gallerys as $gallery){

        $url_gallery = $this->router->urlFor("gallery_view", ['id' => $gallery->id]);

        if ($gallery->images()->get()->isNotEmpty()) {
            $image = $gallery->images()->first()->path;

            $html .= "<a href='$url_gallery'>
                        <div>
                            <h1>$gallery->name</h1>
                            <img src='$image'>
                            <p>$gallery->descript</p>
                        </div>
                    </a>
                    <br>";
        }
    }
        return $html;
    }
}
