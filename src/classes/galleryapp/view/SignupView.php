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
                    <input type="text" name="lastname" placeholder="Nom">
                    <input type="text" name="firstname" placeholder="Prenom">
                    <input type="text" name="pseudo" placeholder="Nom d\'utilisateur">
                    <input type="password" name="password" placeholder="Mot de passe">
                    <input type="password" name="confPass" placeholder="Confirmer le mot de passe">
                    <button type="submit">S\'inscrire</button>
                </form>';
    }
}
