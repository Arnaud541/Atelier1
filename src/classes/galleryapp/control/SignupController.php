<?php

namespace MediaPhoto\galleryapp\control;

use MediaPhoto\mf\router\Router;
use MediaPhoto\galleryapp\view\SignupView;
use MediaPhoto\mf\control\AbstractController;
use MediaPhoto\galleryapp\auth\MediaPhotoAuthentification;

class SignupController extends AbstractController
{
    public function execute(): void
    {
        echo "coucou";
        switch ($this->request->method) {
            case 'GET':
                $SignupView = new SignupView();
                $SignupView->makePage();
                break;
            case 'POST':
                echo "coucou1";
                if (isset($_POST["firstname"]) && !empty($_POST["firstname"]))
                {
                    echo "coucou2";
                    if ($this->request->post['password'] === $this->request->post['confPass'] )
                    {
                    echo "coucou3";
                        $pseudo = filter_var($this->request->post['pseudo'], FILTER_SANITIZE_SPECIAL_CHARS);
                        $password = $this->request->post['password'];
                        $firstname = filter_var($this->request->post['firstname'], FILTER_SANITIZE_SPECIAL_CHARS);
                        $lastname = filter_var($this->request->post['lastname'], FILTER_SANITIZE_SPECIAL_CHARS);
                        MediaPhotoAuthentification::register($pseudo, $password, $firstname, $lastname);
                        echo 'ici';
                        Router::executeRoute('home');
                        
                    }                    
                } 
                else 
                {
                    Router::executeRoute('inscription');
                }
        }
    }
}