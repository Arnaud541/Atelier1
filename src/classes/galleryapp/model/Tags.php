<?php

namespace MediaPhoto\galleryapp\model;

class Tags extends \Illuminate\Database\Eloquent\Model{
    protected $table = "tags";
    protected $primaryKey = "idImg";
    public $timestamp = false; 
}