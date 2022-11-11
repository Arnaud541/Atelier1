<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\galleryapp\model\Gallery;
use MediaPhoto\mf\view\Renderer;
use MediaPhoto\galleryapp\view\MediaPhotoView;

class EditGalleryView extends MediaPhotoView implements Renderer
{
    public function render(): string
    {

        $images = $this->data;
        $gallery = Gallery::find($_SESSION['idGallery']);

        $url_edit_gallery_information = $this->router->urlFor("edit_gallery_information_view", ['id' => $_SESSION['idGallery']]);
        $url_add_image_gallery = $this->router->urlFor("create_image_view");

        $content = "<div>
                        <a href='$url_edit_gallery_information'><button>Modifier</button></a>
                        <h2>$gallery->name</h2>
                        <a href='$url_add_image_gallery'><button>Ajouter une image</button></a>
                    </div>";

        if (count($images) == 0) {
            $content .= "<h1>Aucune image dans la galerie</h1>";
        } else {

            $content .= "<div>";
            foreach ($images as $image) {

                $url_image = $this->router->urlFor("image_view", ['id' => $image->id]);
                $url_delete = $this->router->urlFor("delete_image_view", ['id' => $image->id]);

                $content .= "<div>
                                <a href='$url_delete'>Delete</a>
                            </div>";
                $content .= "<div>
                                <a href='$url_image'><img alt='$image->title' src='$image->path'></a>
                            </div>";
            }
            $content .= "</div>";
        }

        return $content;
    }
}
