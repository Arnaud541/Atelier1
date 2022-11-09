<?php

namespace MediaPhoto\galleryapp\model;

class MediaPhotoView{

    public function renderNavbar(){
        ?>
            <nav id="navbar">
                <a href="#">MediaPhoto</a>
                
                <a href="#">Inscription</a>
                <a href="#">Connexion</a>
            </nav>
        <?php
    }

}