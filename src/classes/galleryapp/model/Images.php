<?php

namespace MediaPhoto\galleryapp\model;

class Images extends \Illuminate\Database\Eloquent\Model{
    protected $table = "images";
    protected $primaryKey = "id";
    public $timestamp = false; 
}