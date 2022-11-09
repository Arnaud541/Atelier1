<?php

namespace MediaPhoto\galleryapp\model;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = "Gallery";
    protected $primaryKey = "id";
    public $timestamp = true;

    public function user()
    {
        return $this->belongsTo('\MediaPhoto\galleryapp\model\User', 'id_user');
    }

    public function images()
    {
        return $this->hasMany('MediaPhoto\galleryapp\model\Image', 'id_gallery');
    }

}
