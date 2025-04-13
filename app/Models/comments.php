<?php

namespace App\Models;

use core\Model;

class comments extends Model
{
    protected $table = 'comments';
    public $timestamps = false;
    protected array $loaded = ['name','comment','reply'];
protected $fillable = ['name','comment','reply'];

protected array $rules =[
    'required'=>['name','comment'],


];
}