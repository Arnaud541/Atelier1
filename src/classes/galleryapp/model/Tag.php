<?php

namespace MediaPhoto\galleryapp\model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "Tags";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function images_tag()
    {
        return $this->hasMany('MediaPhoto\galleryapp\model\Tag', 'id_img');
    }

    public function gallery_tag()
    {
        return $this->hasMany('MediaPhoto\galleryapp\model\Tag', 'id_gallery');
    }
}
