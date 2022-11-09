<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\mf\view\Renderer;
use MediaPhoto\galleryapp\view\MediaPhotoView;

class NewGalleryView extends MediaPhotoView implements Renderer {

    public function render():string{

        return "<form action='' method='post'>
                <h1>Crée une nouvelle galerie</h1>
                <label>Nom:</label><br>
                <input type='text' name='name' placeholder='Nom de la galerie...'><br>
                <label>Description:</label><br>
                <textarea type='text' name='description' placeholder='déscription de la galerie...'></textarea><br>
                <label>Selectionner une image:</label><br>
                <input type='file' name='img' accept='image/*'>
             </form>";
    }
}