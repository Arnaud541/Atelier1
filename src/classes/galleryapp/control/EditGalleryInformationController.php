<?php

namespace MediaPhoto\galleryapp\control;

use MediaPhoto\mf\router\Router;
use MediaPhoto\galleryapp\model\Tag;
use MediaPhoto\mf\view\AbstractView;
use MediaPhoto\galleryapp\model\Gallery;
use MediaPhoto\mf\control\AbstractController;
use MediaPhoto\galleryapp\view\EditGalleryInformationView;

class EditGalleryInformationController extends AbstractController
{
    public function execute(): void
    {
        switch ($this->request->method) {
            case 'GET':
                AbstractView::addStyleSheet('html/css/NewGallery.css');
                $gallery = Gallery::find($this->request->get['id']);
                $editGalleryInformationView = new EditGalleryInformationView($gallery);
                $editGalleryInformationView->makePage();
                break;
            case 'POST':
                if (isset($this->request->post['title']) && isset($this->request->post['description']) && isset($this->request->post['tags']) && isset($this->request->post['mode']) && isset($this->request->post['id_gallery'])) {
                    $gallery = Gallery::find($this->request->post['id_gallery']);

                    $gallery->name = $this->request->post['title'];
                    $gallery->descript = $this->request->post['description'];
                    $gallery->mode = $this->request->post['mode'];
                    $gallery->save();

                    Tag::select()->where('id_gallery', '=', $this->request->post['id_gallery'])->delete();

                    $newTags = $this->request->post['tags'];
                    $newTags = explode(",", $newTags);

                    foreach ($newTags as $word) {
                        $tag = new Tag();
                        $tag->id_gallery = $this->request->post['id_gallery'];
                        $tag->tag = "#" . $word;
                        $tag->save();
                    }

                    $_SESSION['idGallery'] = $gallery->id;

                    Router::executeRoute('edit_gallery_view');
                }
                break;
        }
    }
}
