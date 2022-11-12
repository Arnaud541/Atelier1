<?php

namespace MediaPhoto\galleryapp\control;

use MediaPhoto\mf\router\Router;
use MediaPhoto\galleryapp\view\LoginView;
use MediaPhoto\mf\control\AbstractController;
use MediaPhoto\mf\exceptions\AuthentificationException;
use MediaPhoto\galleryapp\auth\MediaPhotoAuthentification;
use MediaPhoto\mf\view\AbstractView;

class LoginController extends AbstractController
{
    public function execute(): void
    {
        AbstractView::addStyleSheet('html/css/Authentification.css');
        switch ($this->request->method) {
            case 'POST':
                if (isset($this->request->post['pseudo']) && isset($this->request->post['password'])) {
                    if (!empty($this->request->post['pseudo']) && !empty($this->request->post['password'])) {
                        $pseudo = filter_var($this->request->post['pseudo'], FILTER_SANITIZE_SPECIAL_CHARS);
                        $password = $this->request->post['password'];

                        MediaPhotoAuthentification::login($pseudo, $password);
                        Router::executeRoute('home_view');
                    } else {
                        $this->request->method = 'GET';
                        $this->execute();
                        throw new AuthentificationException("Champs vides");
                    }
                } else {
                    $this->request->method = 'GET';
                    $this->execute();
                    throw new AuthentificationException("Il manque des choses");
                }
                break;
            case 'GET':
                $LoginView = new LoginView();
                $LoginView->makePage();
                break;
        }
    }
}
