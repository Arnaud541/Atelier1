<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\mf\view\AbstractView;
use MediaPhoto\mf\view\Renderer;

abstract class MediaPhotoView extends AbstractView implements Renderer
{

    public function renderNavbar(): string
    {

        $login = $this->router->urlFor('login_view');
        $signup = $this->router->urlFor('signup_view');
        $home = $this->router->urlFor('home_view');
        $logout = $this->router->urlFor('logout_view');

        echo $home;


        if (isset($_SESSION['user_profile'])) {
            return  "<nav id='navbar'>
                        <a href='${home}'>MediaPhoto</a>
                        <ul>
                            <li class='drop_down_menu' href='#'><a href='#'>Gallery</a>
                                <ul class'menu'>
                                <li><a href='#'>Mes galeries</a></li>
                                <li><a href='#'>Créer une galerie</a></li>
                                </ul>
                            </li>
                        </ul>
                        <a href='${logout}'>Deconnexion</a>
                    </nav>";
        } else {

            return "<nav id='navbar'>
                        <a href='${home}'>MediaPhoto</a>
                        <a href='${signup}'>Inscription</a>
                        <a href='${login}'>Connexion</a>
                    </nav>";
        }
    }

    public function renderFooter(): string
    {
        return "<footer>crée par P A U L</footer>";
    }

    protected function makeBody(): string
    {

        $header = $this->renderNavbar();
        $content = $this->render();

        $html = "<header>$header</header>";
        $html .= "<section><article>$content</article></section>";
        $html .= $this->renderFooter();

        return $html;
    }
}
