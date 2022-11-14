<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\mf\view\Renderer;
use MediaPhoto\galleryapp\view\MediaPhotoView;

class NewGalleryView extends MediaPhotoView implements Renderer
{

    public function render(): string
    {

        return "
                <form action='' method='POST'>
                    <h1>Créer une nouvelle galerie</h1>       
                    <input type='text' name='title' placeholder='Titre'>
                    <textarea type='text' name='description' placeholder='Description'></textarea>
                    <input type='text' name='tags' placeholder='Tag1, Tag2...'>
                    <div class='mode'>
                        <div>
                            <input type='radio' id='private' name='mode' value='1'>
                            <label for='private'>Privée</label>
                        </div>
                        <div>
                            <input type='radio' id='public' name='mode' value='0'>
                            <label for='public'>Publique</label>
                        </div>
                    </div>
                    <button class='submit' type='submit'>Enregistrer</button>
                </form>
                <script src='html/js/app.js'></script>";
    }
}
