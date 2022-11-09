<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\mf\view\AbstractView;
use MediaPhoto\mf\view\Renderer;

class MediaPhotoView extends AbstractView implements Renderer
{

    public function renderNavbar()
    {

        if (isset($_SESSION['user_profile'])) {
?>
            <nav id="navbar">
                <a href="#">MediaPhoto</a>
                <a href="#">Galerie</a>
                <a href="#">Deconnexion</a>
            </nav>
        <?php
        } else {
        ?>
            <nav id="navbar">
                <a href="#">MediaPhoto</a>
                
                <a href="#">Inscription</a>
                <a href="#">Connexion</a>
            </nav>
<?php
        }
    }

    public function makeBody()
    {
    }
}
