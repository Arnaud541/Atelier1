<?php

use MediaPhoto\mf\view\Renderer;
use MediaPhoto\galleryapp\view\MediaPhotoView;

class HomeView extends MediaPhotoView implements Renderer
{

    public function render(): string
    {

        $gallerys = $this->data;
        $html = "";

        foreach ($gallerys as $gallery) {

            $url_gallery = $this->router->urlFor("view", ['id', $gallery->id]);

            $html .= "<a href='$url_gallery'>";
            $html .= "<div><h1>" . $gallery->name . "<h1>";
            $html .= "<img href='$gallery->path'>" . "</a></div><br>";
        }

        return $html;
    }
}
