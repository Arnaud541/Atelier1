<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\mf\view\Renderer;
use MediaPhoto\galleryapp\view\MediaPhotoView;

class HomeView extends MediaPhotoView implements Renderer{

    public function render():string{

        $gallerys = $this->data;
        $html = "";

        foreach ($gallerys as $gallery){
            echo $gallery->path;


            $url_gallery = $this->router->urlFor("view", ['id', $gallery->id]);


            $html .= "<a href='$url_gallery'>";
            
            if (isset($gallery->images()->first()->path)){

                $image = $gallery->images()->first()->path;

                $html .= "<div><h1>" . $gallery->name . "<h1>";
                $html .= "<img src='$image'>". "</a></div><br>";
            }

            else 
                $html .= "<div><h1>" . $gallery->name . "<h1>";
                $html .= "<div>" . $gallery->description . "</div></div>";
        }

        return $html;
    }
}