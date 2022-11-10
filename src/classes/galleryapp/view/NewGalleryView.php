<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\mf\view\Renderer;
use MediaPhoto\galleryapp\view\MediaPhotoView;

class NewGalleryView extends MediaPhotoView implements Renderer
{

    public function render(): string
    {

        return "<form action='' method='POST'>
                    <h1>Crée une nouvelle galerie</h1>
                    <input type='text' name='title' placeholder='Titre'><br>
                    <textarea type='text' name='description' placeholder='Description'></textarea><br>
                    <input type='text' name='tags' placeholder='Tags'><br>
                    <div>
                        <div>
                            <input type='radio' id='private' name='mode' value='1' checked>
                            <label for='private'>Privée</label>
                        </div>
                        <div>
                            <input type='radio' id='public' name='mode' value='0'>
                            <label for='public'>Publique</label>
                        </div>
                    </div>
                </form>";
    }
}
