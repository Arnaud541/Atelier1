<?php

namespace MediaPhoto\galleryapp\control;

use MediaPhoto\mf\view\AbstractView;
use MediaPhoto\galleryapp\model\Gallery;
use MediaPhoto\galleryapp\view\HomeView;
use MediaPhoto\galleryapp\model\VIPAccess;
use MediaPhoto\mf\control\AbstractController;
use MediaPhoto\mf\auth\AbstractAuthentification;

class HomeController extends AbstractController
{
    const GALLERY_PUBLIC = 0;
    const GALLERY_PRIVATE = 1;


    public function execute(): void
    {
        AbstractView::addStyleSheet('html/css/Gallery.css');
        $itemsPerPage = 6;

        if (isset($_SESSION['user_profile'])) {
            if (isset($this->request->get['mode'])) {
                switch ($this->request->get['mode']) {
                    case 0:
                        $gallerys = Gallery::select()->where('mode', '=', self::GALLERY_PUBLIC)->get();
                        break;
                    case 1:
                        $vipAccess = VIPAccess::select()->where('id_user', '=', AbstractAuthentification::connectedUser())->first();
                        echo $vipAccess;
                        $gallerys = $vipAccess->accessGallery()->get();
                        echo $gallerys;
                        // $gallerys = Gallery::select()->where('mode', '=', self::GALLERY_PRIVATE)->limit($itemsPerPage)->get();
                        break;
                }
            } else {
                $gallerys = Gallery::select()->where('mode', '=', self::GALLERY_PUBLIC)->get();
            }
        } else {
            // $currentPage = (int)($this->request->get['page'] ?? 1);

            // $offset = $itemsPerPage * ($currentPage - 1);
            // $gallerys = Gallery::select()->where('mode', '=', self::GALLERY_PUBLIC)->limit($itemsPerPage)->offset($offset)->get();
            // $totalItems = count($gallerys);
            $gallerys = Gallery::select()->where('mode', '=', self::GALLERY_PUBLIC)->limit($itemsPerPage)->get();
            // $totalPages = ceil($totalItems / $itemsPerPage);
        }
        $view = new HomeView($gallerys);

        $view->makePage();
    }
}
