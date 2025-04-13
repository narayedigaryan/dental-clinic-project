<?php

namespace App\Models;

use core\Model;

class patients extends Model
{
    protected $table = 'patients';
    public $timestamps = false;
    protected array $loaded = ['first_name','last_name','age','gender','contact','medical-history','image_name','image_name2'];
    protected $fillable = ['first_name','last_name','age','gender','contact','medical-history','image_name','image_name2'];

    protected array $rules =[
        'required'=>['first_name','last_name','age','gender','contact'],

        ];

}