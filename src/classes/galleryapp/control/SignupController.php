<?php

namespace MediaPhoto\galleryapp\control;

use MediaPhoto\mf\control\AbstractController;
use MediaPhoto\galleryapp\auth\MediaPhotoAuthentification;

class SignupController extends AbstractController
{
    public function execute(): void
    {
        switch ($this->request->method) {
            case 'GET':
                // $SignupView = new SignupView();
                // $SignupView->makePage();
                break;
            case 'POST':
                if (isset($this->request->post['pseudo']) && isset($this->request->post['password']) && isset($this->request->post['firstname']) && isset($this->request->post['lastname']) && isset($this->request->post['confPass']))
                {
                    if ($this->request->post['password'] === $this->request->post['confPass'] )
                    {
                        $pseudo = filter_var($this->request->post['pseudo'], FILTER_SANITIZE_SPECIAL_CHARS);
                        $password = filter_var($this->request->post['password'], FILTER_SANITIZE_SPECIAL_CHARS);
                        $firstname = filter_var($this->request->post['firstname'], FILTER_SANITIZE_SPECIAL_CHARS);
                        $lastname = filter_var($this->request->post['lastname'], FILTER_SANITIZE_SPECIAL_CHARS);
                        MediaPhotoAuthentification::register($pseudo, $password, $firstname, $lastname);
                        //Router::executeRoute('home');
                    }                    
                } 
                else 
                {
                    //Router::executeRoute('signup');
                }
                break;
        }
    }
}