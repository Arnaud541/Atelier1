<?php

namespace MediaPhoto\galleryapp\control;

use MediaPhoto\mf\auth\AbstractAuthentification;
use MediaPhoto\mf\control\AbstractController;
use MediaPhoto\mf\router\Router;

class LogoutController extends AbstractController
{
    public function execute(): void
    {
        AbstractAuthentification::logout();
        Router::executeRoute('home');
    }
}
