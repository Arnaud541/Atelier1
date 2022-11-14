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

        //echo $home;


        if (isset($_SESSION['user_profile'])) {
            return  '<nav id="navbar">
                        <a href="main.php">MediaPhoto</a>
                        <div></div>
                        <div id="fullsize">
                            <li>Galeries <i class="fas fa-angle-down"></i>
                                <ul>
                                    <a href="main.php?action=view_my_gallery"><li>Mes galeries</li></a>
                                    <a href="main.php?action=new_gallery"><li>Créer une galerie</li></a> 
                                </ul>
                            </li>
                            <a href="main.php?action=logout">Deconnexion</a>
                        </div>
                        <div id="mobile_size">
                            <i class="fa-solid fa-bars"></i>
                            <div>
                                <a href="main.php?action=view_my_gallery">Mes galeries</a>
                                <a href="main.php?action=new_gallery">Créer une galerie</a> 
                                <a href="main.php?action=logout">Deconnexion</a>
                            </div>
                        </div>
                    </nav>';
        } else {

            return '<nav id="navbar">
                        <a href="main.php">MediaPhoto</a>
                        <div></div>
                        <div id="fullsize">
                            <a href="main.php?action=signup">Inscription</a>
                            <a href="main.php?action=login">Connexion</a>
                        </div>
                        <div id="mobile_size">
                            <i class="fa-solid fa-bars"></i>
                            <div>
                                <a href="main.php?action=signup">Inscription</a>
                                <a href="main.php?action=login">Connexion</a>
                            </div>
                        </div>
                    </nav>';
        }
    }

    public function renderFooter(): string
    {
        return '<footer><a href="main.php?action=about">A propos</a></footer>';
    }

    protected function makeBody(): string
    {

        $header = $this->renderNavbar();
        $content = $this->render();

        $html = "<header>$header</header>";
        $html .= "<section>$content</section>";
        $html .= $this->renderFooter();

        return $html;
    }
}
