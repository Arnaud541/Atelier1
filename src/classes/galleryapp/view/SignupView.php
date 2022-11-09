<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\galleryapp\view\MediaPhotoView;
use MediaPhoto\mf\view\Renderer;

class SignupView extends MediaPhotoView implements Renderer
{
    public function render(): string
    {
        return '<form action="" method="post">
                    <h1>Inscription</h1>
                    <input type="text" name="firstname">
                    <input type="text" name="lastname">
                    <input type="text" name="pseudo">
                    <input type="text" name="password">
                    <input type="text" name="confPass">
                    <button type="submit">S inscrire</button>
                </form>';
    }
}