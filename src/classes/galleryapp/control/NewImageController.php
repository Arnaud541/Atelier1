<?php

namespace MediaPhoto\galleryapp\control;

use MediaPhoto\mf\router\Router;
use MediaPhoto\galleryapp\model\Tag;
use MediaPhoto\galleryapp\model\Image;
use MediaPhoto\galleryapp\view\NewImageView;
use MediaPhoto\mf\control\AbstractController;
use MediaPhoto\mf\view\AbstractView;

class NewImageController extends AbstractController
{
    public function execute(): void
    {
        switch ($this->request->method) {
            case 'GET':
                AbstractView::addStyleSheet('html/css/NewImage.css');
                $newImageView = new NewImageView();
                $newImageView->makePage();
                break;
            case 'POST':
                if (isset($this->request->post['title']) && isset($this->request->post['data']) && isset($this->request->post['tags'])) {
                    if (!empty($this->request->post['title']) && !empty($this->request->post['data']) && !empty($this->request->post['tags']) && $_FILES['photo']['error'] == 0) {
                        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                        $filename = $_FILES["photo"]["name"];
                        $filetype = $_FILES["photo"]["type"];
                        $filetmpname = $_FILES["photo"]["tmp_name"];

                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                        if (array_key_exists($ext, $allowed)) {

                            if (in_array($filetype, $allowed)) {
                                if (file_exists("/var/www/html/Atelier1/html/images/" . $filename)) {
                                    echo $filename . " existe déjà.";
                                } else {
                                    move_uploaded_file($filetmpname, "/var/www/html/Atelier1/html/images/" . $filename);
                                    $path = "./html/images/" . $filename;
                                }
                            }
                        }

                        $image = new Image();
                        $image->id_gallery = $_SESSION['idGallery'];
                        $image->title = $this->request->post['title'];
                        $image->path = $path;
                        $image->descript = $this->request->post['data'];
                        $image->save();

                        $tags = $this->request->post['tags'];
                        $tags = explode(",", $tags);

                        foreach ($tags as $word) {
                            $tag = new Tag();
                            $tag->id_img = $image->id;
                            $tag->tag = "#" . $word;
                            $tag->save();
                        }

                        Router::executeRoute('edit_gallery_view');
                    }
                } else {
                    $this->request->method = 'GET';
                    $this->execute();
                }
                break;
        }
    }
}
