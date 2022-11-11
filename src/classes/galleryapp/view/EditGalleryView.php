<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\mf\view\Renderer;
use MediaPhoto\galleryapp\view\MediaPhotoView;

class EditGalleryView extends MediaPhotoView implements Renderer
{
    public function render(): string
    {

        $images = $this->data;
        $galleryName = $images[0]->gallery()->first()->name;

        $content = "<div>
                        <h2>$galleryName</h2>
                    <div>";

        if (count($images) == 0) {
            $content .= "<h1>Aucune image dans la galerie</h1>";
        } else {

            foreach ($images as $image) {

                $url_image = $this->router->urlFor("image_view", ['id' => $image->id]);
                $url_delet = $this->router->urlFor("delet_image", ['id' => $image->id]);


                //$url_edit = $this->router->urlFor("Quand ce sera fait");
                $content .= "<div>
                                <a href=''>Edit</a>
                                <a href='$url_delet'>Delet</a>
                            </div>";
                $content .= "<div><a href='$url_image'><img alt='$image->title' src='$image->path'></a></div>";
            }
            $content .= "</div></div>";
        }

        return $content;
    }
}
