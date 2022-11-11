<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\galleryapp\view\MediaPhotoView;
use MediaPhoto\mf\view\Renderer;

class NewImageView extends MediaPhotoView implements Renderer
{
    public function render(): string
    {
        $ajoutImage = $this->router->urlFor("create_image_view");
        return "<h1>Ajouter une image</h1>
                <form action='$ajoutImage' method='POST' enctype='multipart/form-data'>
                    <input type='text' name='title' placeholder='Titre'><br>
                    <input type='text' name='data' placeholder='Données techniques'><br>
                    <input type='text' name='tags' placeholder='Tags'><br>
                    <input type='file' name='photo' placeholder='Choisir une image...'><br>
                    <button type='submit'>Ajouter</button>
                </form>";
    }
}
