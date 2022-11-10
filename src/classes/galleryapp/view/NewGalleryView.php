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
                <input type='text' name='name' placeholder='Titre'><br>
                <textarea type='text' name='descript' placeholder='Description'></textarea><br>
                <button type='submit'>Créer</button>

             </form>";
    }
}
