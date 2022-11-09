<?php

namespace MediaPhoto\galleryapp\model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = "Images";
    protected $primaryKey = "id";
    public $timestamps = ["created_at"];
    const UPDATED_AT = null;
}
