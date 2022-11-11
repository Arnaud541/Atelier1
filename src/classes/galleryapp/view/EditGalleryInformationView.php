<?php

namespace MediaPhoto\galleryapp\view;

use MediaPhoto\galleryapp\model\Tag;
use MediaPhoto\mf\view\Renderer;

class EditGalleryInformationView extends MediaPhotoView implements Renderer
{
    public function render(): string
    {
        $gallery = $this->data;
        $tags = Tag::select()->where('id_gallery', '=', $gallery->id)->get();

        $tags_word = [];
        foreach ($tags as $tag) {
            $word = substr($tag->tag, 1);
            array_push($tags_word, $word);
        }
        $tags_word = implode(',', $tags_word);

        return "<h1>Modifier la galerie</h1>
                <form action='' method='POST'>        
                    <input type='text' name='title' placeholder='Titre' value='$gallery->name'><br>
                    <textarea type='text' name='description' placeholder='Description'>$gallery->descript</textarea><br>
                    <input type='text' name='tags' placeholder='Tag1,Tag2...' value='$tags_word'><br>
                    <div>
                        <div>
                            <input type='radio' id='private' name='mode' value='1' checked>
                            <label for='private'>Privée</label>
                        </div>
                        <div>
                            <input type='radio' id='public' name='mode' value='0'>
                            <label for='public'>Publique</label>
                        </div>
                    </div>
                    <input type='hidden' name='id_gallery' value='$gallery->id'>
                    <button type='submit'>Modifier</button>
                </form>";
    }
}
