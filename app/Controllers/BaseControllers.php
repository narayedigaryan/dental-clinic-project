<?php

namespace App\Controllers;

use core\Controllers;

class BaseControllers extends Controllers
{
        public function __construct()
        {
            app()->set('test','Test value');
            if(!$menu_site = cache()->get('menu_site')){
                cache()->set('menu_site', $this->renderMenu(),10);
            }
           // app()->set('menu_site',$this->renderMenu());
        }
        public function renderMenu()
        {
            return view()->renderPartial('site/includes/menu_site');
        }
}