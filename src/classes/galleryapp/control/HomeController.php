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
        $page = 1;
        if (isset($this->request->get['page'])) {
            $page = $this->request->get['page'];
        }
        if (isset($_SESSION['user_profile'])) {
            if (isset($this->request->get['mode']) && isset($this->request->get['page']) && !empty($this->request->get['page'])) {
                $current_page = $this->request->get['page'];
                switch ($this->request->get['mode']) {
                    case 0:
                        $gallerys = Gallery::select()->where('mode', '=', self::GALLERY_PUBLIC)->get();
                        break;
                    case 1:
                        $gallerys = Gallery::select('id', 'Gallery.id_user', 'name', 'descript', 'mode', 'created_at', 'updated_at')->join('VIPAccess', 'VIPAccess.id_gallery','=','Gallery.id')->where('VIPAccess.id_user', '=', AbstractAuthentification::connectedUser())->get();
                        //var_dump($gallerys);
                        // if ($vipAccess != null) {
                        //     $gallerys = $vipAccess->accessGallery()->get();
                        //     var_dump($vipAccess);
                            
                        // } else {
                        //     $gallerys = [];
                        // }
                        // $gallerys = Gallery::select()->where('mode', '=', self::GALLERY_PRIVATE)->limit($itemsPerPage)->get();
                        break;
                }
            } else {
                $currentPage = (int)($page ?? 1);
                $offset = $itemsPerPage * ($currentPage - 1);
                $gallerys = Gallery::select()->where('mode', '=', self::GALLERY_PUBLIC)->limit($itemsPerPage)->offset($offset)->get();
                $totalItems = count($gallerys);
                $totalPages = ceil($totalItems / $itemsPerPage);
            }
        } else {
            $currentPage = (int)($page ?? 1);

            $offset = $itemsPerPage * ($currentPage - 1);
            $gallerys = Gallery::select()->where('mode', '=', self::GALLERY_PUBLIC)->limit($itemsPerPage)->offset($offset)->get();
            $totalItems = count($gallerys);
            $totalPages = ceil($totalItems / $itemsPerPage);
        }
        $view = new HomeView($gallerys);

        $view->makePage();
    }
}
