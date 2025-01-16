<?php

namespace App\Models;

use core\Model;

class admins extends Model
{
    protected $table = 'admins';
    public $timestamps = false;
    protected array $loaded = ['fname','lname','email','password','repeatpassword'];
protected $fillable = ['fname','lname','email','password'];

protected array $rules =[
    'required'=>['fname','lname','email','password','repeatpassword'],
    'email'=>['email'],
    'lengthMin'=>[
        ['password',6],
    ],
    'equals'=>[
        ['password','repeatpassword'],
    ],
//    'unique'=>[
//        ['email','admins,email']
//    ],
];
}