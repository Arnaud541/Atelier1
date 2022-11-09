<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\mf\view\Renderer;

class LoginView extends MediaPhotoView implements Renderer
{

    public function render(): string
    {
        return '<form action="" method="post">
                    <h1>Connexion</h1><br/>
                    <input type="text" name="pseudo" placeholder="Nom d\'utilisateur"><br/>
                    <input type="text" name="password" placeholder="Mot de passe"><br/>
                    <button type="submit">Se connecter</button>
                </form>';
    }
}
