<?php

namespace App\Models;

use core\Model;

class images_background extends Model
{
    protected $table = 'images_background';
    public $timestamps = false;
    protected array $loaded = ['image_name'];
    protected $fillable = ['image_name'];
    protected array $rules = [
        'required' => ['image_name'],


    ];
}