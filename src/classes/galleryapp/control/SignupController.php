<?php

namespace MediaPhoto\galleryapp\control;

use MediaPhoto\mf\router\Router;
use MediaPhoto\mf\view\AbstractView;
use MediaPhoto\galleryapp\view\SignupView;
use MediaPhoto\mf\control\AbstractController;
use MediaPhoto\mf\exceptions\AuthentificationException;
use MediaPhoto\galleryapp\auth\MediaPhotoAuthentification;

class SignupController extends AbstractController
{
    public function execute(): void
    {
        AbstractView::addStyleSheet('html/css/Form.css');
        switch ($this->request->method) {
            case 'GET':
                $SignupView = new SignupView();
                $SignupView->makePage();
                break;
            case 'POST':
                if (isset($this->request->post["firstname"]) && isset($this->request->post["lastname"]) && isset($this->request->post["password"]) && isset($this->request->post["pseudo"]) && isset($this->request->post["confPass"])) {
                    if (!empty($this->request->post["firstname"]) && !empty($this->request->post["lastname"]) && !empty($this->request->post["password"]) && !empty($this->request->post["pseudo"]) && !empty($this->request->post["confPass"])) {
                        if ($this->request->post['password'] === $this->request->post['confPass']) {
                            $pseudo = filter_var($this->request->post['pseudo'], FILTER_SANITIZE_SPECIAL_CHARS);
                            $password = $this->request->post['password'];
                            $firstname = filter_var($this->request->post['firstname'], FILTER_SANITIZE_SPECIAL_CHARS);
                            $lastname = filter_var($this->request->post['lastname'], FILTER_SANITIZE_SPECIAL_CHARS);
                            MediaPhotoAuthentification::register($pseudo, $password, $firstname, $lastname);
                            Router::executeRoute('home_view');
                        } else {
                            // throw new AuthentificationException("Mot de passe non égal.");
                            $this->request->method = 'GET';
                            $this->execute();
                        }
                    } else {
                        // throw new AuthentificationException("Un champ est vide. Veuillez réessayer");
                        $this->request->method = 'GET';
                        $this->execute();
                    }
                } else {
                    $this->request->method = 'GET';
                    $this->execute();
                }
                break;
        }
    }
}
