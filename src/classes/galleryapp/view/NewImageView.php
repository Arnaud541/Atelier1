<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\galleryapp\view\MediaPhotoView;
use MediaPhoto\mf\view\Renderer;

class NewImageView extends MediaPhotoView implements Renderer
{
    public function render(): string
    {
        $ajoutImage = $this->router->urlFor("create_image_view");
        return "
                <form action='$ajoutImage' method='POST' enctype='multipart/form-data'>
                    <h1>Ajouter une image</h1>
                    <input type='text' name='title' placeholder='Titre'>
                    <input type='text' name='data' placeholder='Données techniques'>
                    <input type='text' name='tags' placeholder='Tag1, Tag2...'>
                    <input type='file' name='photo' id='inputfile'>
                    <label for='inputfile'><i class='fa-solid fa-image'></i>Choisir une photo...</label>
                    <button type='submit'>Ajouter</button>
                </form>";
    }
}
