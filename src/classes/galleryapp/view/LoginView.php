<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\mf\view\Renderer;
use MediaPhoto\mf\view\AbstractView;

class LoginView extends MediaPhotoView implements Renderer
{

    public function render(): string
    {
        return '<form action="" method="post" id="login">
                    <h1>Connexion</h1><br/>
                    <input type="text" name="pseudo" placeholder="Nom d\'utilisateur"><br/>
                    <input type="password" name="password" placeholder="Mot de passe"><br/>
                    <button type="submit">Se connecter</button>
                </form>';
    }
}
