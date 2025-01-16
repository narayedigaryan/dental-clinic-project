<?php

namespace App\Controllers\Site;

use App\Controllers\BaseControllers;

class SiteController extends BaseControllers
{
    public function implantation()
    {
        return view('site/includes/implantation', ['title' => 'Implantation'], 'layouts/site_layout');

    }

    public function ortopedia()
    {
        return view('site/includes/ortopedia', ['title' => 'Ortopedia'], 'layouts/site_layout');

    }

}