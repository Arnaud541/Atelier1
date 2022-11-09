<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\galleryapp\view\MediaPhotoView;
use MediaPhoto\mf\view\Renderer;

class SignupView extends MediaPhotoView implements Renderer
{
    public function render(): string
    {
        return '<form action="" method="post">
                    <h1>Inscription</h1><br/>
                    <input type="text" name="firstname"><br/>
                    <input type="text" name="lastname"><br/>
                    <input type="text" name="pseudo"><br/>
                    <input type="text" name="password"><br/>
                    <input type="text" name="confPass"><br/>
                    <button type="submit">S inscrire</button>
                </form>';
    }
}