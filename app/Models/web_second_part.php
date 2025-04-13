<?php

namespace App\Models;

use core\Model;

class web_second_part extends Model
{
    /**
     * @var mixed|string
     */
    public mixed $image_name='';
    protected $table = 'web_second_part';
    public $timestamps = false;
    protected array $loaded = ['name', 'description','image_name'];
    protected $fillable = ['name', 'description','image_name'];
    protected array $rules = [
        'required' => ['name', 'description','image_name'],
    ];
}