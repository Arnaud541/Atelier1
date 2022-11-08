<?php

namespace MediaPhoto\galleryapp\model;

class User extends \Illuminate\Database\Eloquent\Model{
    protected $table = "user";
    protected $primaryKey = "id";
    public $timestamp = false; 
}