<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\mf\view\Renderer;
use MediaPhoto\galleryapp\view\MediaPhotoView;
use MediaPhoto\mf\view\AbstractView;

class HomeView extends MediaPhotoView implements Renderer
{

    public function render(): string
    {
        // AbstractView::addStyleSheet('html/css/Gallery.css');
        $gallerys = $this->data;
        $html = "";



        if (isset($_SESSION['user_profile'])) {
            $url_home_gallery_public = $this->router->urlFor('home_view', ['mode' => 0]);
            $url_home_gallery_private = $this->router->urlFor('home_view', ['mode' => 1]);
            $html .= "<div><a href='$url_home_gallery_public'>Publique</a>/<a href='$url_home_gallery_private'>Privée</a></div>";
        }

        $html .= "<div class='container'>";
        foreach ($gallerys as $gallery) {

            $url_gallery = $this->router->urlFor("gallery_view", ['id' => $gallery->id]);


            if ($gallery->images()->get()->isNotEmpty()) {

                $image = $gallery->images()->first()->path;


                $html .= "
                        <a href='$url_gallery'>
                            <div class='gallery'>
                                <h1>$gallery->name</h1>
                                <img src='$image'>
                                <p>$gallery->descript</p>
                            </div>
                        </a>
                        ";
            }
            //else {
            //     $html .= "<a href='$url_gallery'>
            //                 <div>
            //                     <h1>$gallery->name</h1>
            //                     <p>$gallery->descript</p>
            //                 </div>
            //             </a><br>";
            // }
        }

        $html .= "</div>";

        // $html .= "<div>";
        //         if((int)($this->request->get['page']) > 1)
        //         {
        //             $param_url_gallery_page = $this->request->get['page'] - 1;
        //             $url = "{$this->router->urlFor('home_view')}?page=$param_url_gallery_page";
        //             $html.= "<a href='$url'>Page Precédente</a>";
        //         }
        //         if((int)($this->request->get['page']) < / count($gallerys))
        //         {
        //             $param_url_gallery_page = $this->request->get['page'] - 1;
        //             $url = "{$this->router->urlFor('home_view')}?page=$param_url_gallery_page";
        //             $html.= "<a href='$url'>Page Precédente</a>";
        //         }
        //         "</div>";


        return $html;
    }
}
