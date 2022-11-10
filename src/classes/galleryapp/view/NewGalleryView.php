<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\mf\view\Renderer;
use MediaPhoto\galleryapp\view\MediaPhotoView;

class NewGalleryView extends MediaPhotoView implements Renderer
{

    public function render(): string
    {

        return "<form action='' method='post'>
                <h1>Crée une nouvelle galerie</h1>
                <input type='text' name='title' placeholder='Titre'><br>
                <textarea type='text' name='data' placeholder='Description'></textarea><br>
                <input placeholder='Choisir un fichier...' type='file' name='img' accept='image/*'>
             </form>";
    }
}
