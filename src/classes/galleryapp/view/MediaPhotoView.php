<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\mf\view\AbstractView;
use MediaPhoto\mf\view\Renderer;

abstract class MediaPhotoView extends AbstractView implements Renderer
{

    public function renderNavbar()
    {

        if (isset($_SESSION['user_profile'])) {
            return '<nav id="navbar">
                        <a href="#">MediaPhoto</a>
                        <a href="#">Galerie</a>
                        <a href="#">Deconnexion</a>
                    </nav>';
        } else {
            return '<nav id="navbar">
                        <a href="#">MediaPhoto</a>
                        <a href="#">Inscription</a>
                        <a href="#">Connexion</a>
                    </nav>';
        }
    }

    public function renderFooter():string{
        return "<footer>crée par P A U L</footer>";
    }

    protected function makeBody():string{

        $content = $this->render();
        $navbar = $this->renderNavbar();
        $footer = $this->renderFooter();

        $html = "<header>$navbar</header>";
        $html .= "<section><article>$content</article></section>";
        $html .= $footer;

        return $html;
    }

    
}
