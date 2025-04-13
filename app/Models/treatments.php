<?php

namespace App\Models;

use core\Model;

class treatments extends Model
{
    protected $table = 'treatments';
    public $timestamps = false;
    protected array $loaded = ['name', 'description', 'price_1', 'price_2', 'category'];
    protected $fillable = ['name', 'description', 'price_1', 'price_2', 'category'];
    protected array $rules = [
        'required' => ['name', 'description', 'price_1'],


    ];
}