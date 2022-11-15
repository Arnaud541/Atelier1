<?php

namespace MediaPhoto\galleryapp\model;

use Illuminate\Database\Eloquent\Model;

class VIPAccess extends Model
{
    protected $table = "VIPAccess";
    protected $primaryKey = 'id_user';
    public $incrementing = false;
    public $timestamps = false;

    public function accessGallery()
    {
        return $this->hasMany('MediaPhoto\galleryapp\model\Gallery', 'id');
    }
}
