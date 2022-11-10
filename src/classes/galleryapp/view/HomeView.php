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

        if (isset($_SESSION['user_profile'])) {
            $url_home_gallery_public = $this->router->urlFor('home_view', ['mode' => 0]);
            $url_home_gallery_private = $this->router->urlFor('home_view', ['mode' => 1]);
            $html .= "<div><a href='$url_home_gallery_public'>Publique</a>/<a href='$url_home_gallery_private'>Privée</a></div>";
        }


        foreach ($gallerys as $gallery) {

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
