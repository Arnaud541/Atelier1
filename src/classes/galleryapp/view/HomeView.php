<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\mf\view\Renderer;
use MediaPhoto\galleryapp\view\MediaPhotoView;

class HomeView extends MediaPhotoView implements Renderer
{

    public function render(): string
    {

        $gallerys = $this->data;
        $html = "";

        foreach ($gallerys as $gallery){

            $url_gallery = $this->router->urlFor("view", ['id', $gallery->id]);


            if (isset($gallery->images()->first()->path)){
                $image = $gallery->images()->first()->path;


                $html .= "<a href='$url_gallery'>";
                $html .= "<div><h1>" . $gallery->name . "<h1>";
                $html .= "<img src='$image'>". "</a></div><div>$gallery->descript</div><br>";
            }
            else {
                $html .= "<a href='$url_gallery'>";
                $html .= "<div><h1>" . $gallery->name . "<h1>";
                $html .= "<div>" . $gallery->descript . "</div></div><br>";
            }
        }

        return $html;
    }
}
