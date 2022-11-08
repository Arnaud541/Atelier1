<?php

namespace MediaPhoto\galleryapp\model;

class Gallery extends \Illuminate\Database\Eloquent\Model{
    protected $table = "gallery";
    protected $primaryKey = "id";
    public $timestamp = false; 
}