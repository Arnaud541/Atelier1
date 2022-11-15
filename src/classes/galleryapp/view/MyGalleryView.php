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
        $html .= count($gallerys) > 1 ? "<h2>Mes galeries</h2>" : "<h2>Ma galerie</h2>";
        $html .= "<div class='container-grid'>";
        foreach ($gallerys as $gallery) {

            $url_gallery = $this->router->urlFor("edit_gallery_view", ['id' => $gallery->id]);


            if ($gallery->images()->get()->isNotEmpty()) {
                $image = $gallery->images()->first()->path;


                $html .= "<a href='$url_gallery'>
                            <div class='gallery'>
                                <img src='$image'>
                                <div class='gallery-description'>
                                    <h1>$gallery->name</h1>                              
                                    <p>$gallery->descript</p>
                                </div>
                            </div>
                        </a>";
            }
        }
        $html .= "</div>";
        return $html;
    }
}
