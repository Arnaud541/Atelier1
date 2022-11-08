<?php

namespace MediaPhoto\galleryapp\model;

class Tags extends \Illuminate\Database\Eloquent\Model{
    protected $table = "tags";
    protected $primaryKey = "idImg";
    public $timestamp = false;
    
    public function images_tag(){
        return $this->hasMany('MediaPhoto\galleryapp\model\Tags', 'id_img');
    }

    public function gallery_tag(){
        return $this->hasMany('MediaPhoto\galleryapp\model\Tags', 'id_gallery');
    }
}