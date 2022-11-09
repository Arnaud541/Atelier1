<?php

namespace MediaPhoto\galleryapp\control;

use MediaPhoto\galleryapp\model\Gallery;
use MediaPhoto\galleryapp\view\HomeView;
use MediaPhoto\mf\control\AbstractController;

class HomeController extends AbstractController
{
    const GALLERY_PUBLIC = 0;
    const GALLERY_PRIVATE = 1;

    public function execute(): void
    {
        if (isset($_SESSION['user_profile'])) {
            if (isset($this->request->get['mode'])) {
                switch ($this->request->get['mode']) {
                    case 0:
                        $gallerys = Gallery::select()->where('mode', '=', self::GALLERY_PUBLIC)->get();
                        break;
                    case 1:
                        $gallerys = Gallery::select()->where('mode', '=', self::GALLERY_PRIVATE)->get();
                        break;
                }
            } else {
                $gallerys = Gallery::select()->where('mode', '=', self::GALLERY_PUBLIC)->get();
            }
        } else {
            $gallerys = Gallery::select()->where('mode', '=', self::GALLERY_PUBLIC)->get();
        }


        $view = new HomeView($gallerys);

        $view->makePage();
    }
}
