<?php

namespace MediaPhoto\galleryapp\model;

class Gallery extends \Illuminate\Database\Eloquent\Model{
    protected $table = "gallery";
    protected $primaryKey = "id";
    public $timestamp = false; 

    public function user(){
        return $this->belongsTo('MediaPhoto\galleryapp\model\User', 'id_user');
    }

    public function images(){
        return $this->hasMany('MediaPhoto\galleryapp\model\Images', 'id_gallery');
    }

}

