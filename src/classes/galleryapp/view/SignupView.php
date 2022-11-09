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
                    <input type="text" name="lastname" placeholder="Nom"><br/>
                    <input type="text" name="firstname" placeholder="Prenom"><br/>
                    <input type="text" name="pseudo" placeholder="Nom d\'utilisateur"><br/>
                    <input type="text" name="password" placeholder="Mot de passe"><br/>
                    <input type="text" name="confPass" placeholder="Confirmer le mot de passe"><br/>
                    <button type="submit">S\'inscrire</button>
                </form>';
    }
}
