<?php

namespace MediaPhoto\galleryapp\control;

use Exception;
use MediaPhoto\mf\router\Router;
use MediaPhoto\galleryapp\model\Tag;
use MediaPhoto\galleryapp\model\Image;
use MediaPhoto\galleryapp\view\NewImageView;
use MediaPhoto\mf\control\AbstractController;
use MediaPhoto\mf\exceptions\NotExistException;

class NewImageController extends AbstractController
{
    public function execute(): void
    {
        switch ($this->request->method) {
            case 'GET':
                $newImageView = new NewImageView();
                $newImageView->makePage();
                break;
            case 'POST':
                if (isset($this->request->post['title']) && isset($this->request->post['data']) && isset($this->request->post['tags']) && isset($_FILES['photo'])) {
                    if (!empty($this->request->post['title']) && !empty($this->request->post['data']) && !empty($this->request->post['tags']) && $_FILES['photo']['error'] == 0) {
                        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                        $filename = $_FILES["photo"]["name"];
                        $filetype = $_FILES["photo"]["type"];
                        $filesize = $_FILES["photo"]["size"];
                        $filetmpname = $_FILES["photo"]["tmp_name"];

                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                        if (array_key_exists($ext, $allowed)) {

                            $maxsize = 5 * 1024 * 1024;
                            if ($filesize < $maxsize) {
                                if (in_array($filetype, $allowed)) {
                                    if (file_exists("../html/images/" . $filename)) {
                                        echo $filename . " existe déjà.";
                                    } else {
                                        move_uploaded_file($filetmpname, "../html/images/" . $filename);
                                        $path = "../html/images/" . $filename;
                                        echo "Votre fichier a été téléchargé avec succès.";
                                    }
                                }
                            }
                        }

                        $tags = $this->request->post['tags'];
                        $tags = explode(",", $tags);


                        $image = new Image();
                        $image->id_gallery = $_SESSION['idGallery'];
                        $image->title = $this->request->post['title'];
                        $image->path = $path;
                        $image->descript = $this->request->post['data'];
                        $image->save();

                        foreach ($tags as $tag) {
                            $tag = new Tag();
                            $tag->id_img = $image->id;
                            $tag->tag = "#" . $tag->tag;
                            $tag->save();
                        }

                        Router::executeRoute('gallery_view');
                    }
                } else {
                    throw new NotExistException("Un des champs n'a pas été validé");
                }
                break;
        }
    }
}
