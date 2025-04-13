<?php

namespace App\Models;

use core\Model;

class images_background extends Model
{
    /**
     * @var mixed|string
     */
    public mixed $image_name;
    protected $table = 'images_background';
    public $timestamps = false;
    protected array $loaded = ['image_name', 'img_path'];
    protected $fillable = ['image_name', 'img_path'];
    protected array $rules = [
        'required' => ['image_name'],


    ];
}