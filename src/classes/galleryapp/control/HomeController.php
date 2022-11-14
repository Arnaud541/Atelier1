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
        AbstractView::addStyleSheet('html/css/MediaPhoto.css');
        AbstractView::removeStyleSheet('html/css/Form.css');
        $itemsPerPage = 6;

        if (isset($_SESSION['user_profile'])) {
            if (isset($this->request->get['mode']) && isset($this->request->get['page']) && !empty($this->request->get['page'])) {
                $current_page = $this->request->get['page'];
                switch ($this->request->get['mode']) {
                    case 0:
                        $gallerys = Gallery::select()->where('mode', '=', self::GALLERY_PUBLIC)->get();
                        break;
                    case 1:
                        $vipAccess = VIPAccess::select()->where('id_user', '=', AbstractAuthentification::connectedUser())->first();
                        if ($vipAccess != null) {
                            $gallerys = $vipAccess->accessGallery()->get();
                        } else {
                            $gallerys = []; 
                        }
                        break;
                }
            } else {
                $gallerys = Gallery::select()->where('mode', '=', self::GALLERY_PUBLIC)->get();

            }
        } else {
            $gallerys = Gallery::select()->where('mode', '=', self::GALLERY_PUBLIC)->get();
            $total_items = count($gallerys);
            $total_pages = ceil($total_items/$itemsPerPage);
            $current_page = 1;

            echo $total_items, $total_pages;
        }
        $view = new HomeView($gallerys);

        $view->makePage();
    }
}
