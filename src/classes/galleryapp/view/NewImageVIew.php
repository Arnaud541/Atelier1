<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\galleryapp\view\MediaPhotoView;
use MediaPhoto\mf\view\Renderer;

class NewImageView extends MediaPhotoView implements Renderer
{
    public function render(): string
    {
        return "<form action='' method='POST'>
                    <input type='text' name='title' placeholder='Titre'>
                    <input type='text' name='data' placeholder='Données techniques'>
                    <input type='text' name='tags' placeholder='Tags'>
                    <input type='file' name='photo' placeholder='Choisir une image...'>
                    <button type='submit'>Ajouter</button>
                </form>";
    }
}
