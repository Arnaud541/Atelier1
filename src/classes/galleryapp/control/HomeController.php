<?php

namespace MediaPhoto\galleryapp\control;

use MediaPhoto\galleryapp\model\Gallery;
use MediaPhoto\mf\control\AbstractController;

class HomeController extends AbstractController{

    public function execute():void{

        $gallerys = Gallery::select()->get();

        $view = new HomeView($gallerys);

        $view->makePage();
    }
}
