<?php

namespace MediaPhoto\galleryapp\model;

use MediaPhoto\mf\view\Renderer;
use MediaPhoto\mf\view\AbstractView;

class MediaPhotoView extends AbstractView implements Renderer{

    public function renderNavbar(){
        ?>
            <nav id="navbar">
                <a href="#">MediaPhoto</a>
                <a href="#">Inscription</a>
                <a href="#">Connexion</a>
            </nav>
        <?php
    }

    public function renderFooter():string{
        return "<footer>crée par P A U L</footer>";
    }

    public function makeBody():void{

    }

}