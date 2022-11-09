<?php

namespace MediaPhoto\galleryapp\model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "Users";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function gallery()
    {
        return $this->hasMany('MediaPhoto\galleryapp\model\Gallery', 'id_user');
    }
}
