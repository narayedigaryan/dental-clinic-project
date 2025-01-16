<?php
//ստեղծում ենք ROOT անունով կոնստանտը, որին տվել ենք define() արժեքը
define("ROOT", dirname(__DIR__));
const DEBUG = 1;
const WWW = ROOT . '/public';
const CONFIG_PATH = ROOT . '/config';
const HELPERS = ROOT . '/helpers';
const APP = ROOT . '/app';


const CORE = ROOT . '/core';
const VIEW = APP . '/Views';
const ERROR_LOGS = ROOT . '/tmp/error.log';
const CACHE = ROOT . '/tmp/cache';
const  LAYOUT = 'layouts/default';
const PATH = 'http://localhost/dental_clinic_mushegh';
const DB_SETTINGS = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'database' => 'dental_clinic_mushegh',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
         'port' => 3307  ,
        'prefix' => '',
];
const MAIL_SETTINGS = [
    'driver' => 'smtp',
     'host' => 'smtp.mail.ru',
    'auth'=>'true',
    'username'=>'nara_e@mail.ru',
    'password'=>'kktricEQFxHwyMEQmmTD',
    'secure'=>'ssl',
    'port' => 465,
    'from_email'=>'nara_e@mail.ru',
    'from_name'=>'Dental Clinic Mushegh',
    'is_html' => true,
    'charset' => 'utf-8',
    'debug' => 4,//0-4
];
const PAGINATION_SETTINGS = [
    'perPage' => 3,
    'midSize' => 1,
    'maxPages' => 3,
    'tpl' => 'pagination/base',
];
