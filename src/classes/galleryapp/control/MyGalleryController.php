<?php

namespace MediaPhoto\galleryapp\control;

use MediaPhoto\galleryapp\model\User;
use MediaPhoto\galleryapp\model\Gallery;
use MediaPhoto\galleryapp\view\MyGalleryView;
use MediaPhoto\mf\control\AbstractController;
use MediaPhoto\mf\auth\AbstractAuthentification;

class MyGalleryController extends AbstractController
{

    public function execute(): void
    {

        $user = User::select()->where('id', '=', AbstractAuthentification::connectedUser())->first();

        $gallerys = $user->gallery()->get();

        $MyGalleryView = new MyGalleryView($gallerys);

        $MyGalleryView->makePage();
    }
}
