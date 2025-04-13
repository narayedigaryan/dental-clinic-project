<?php

namespace App\Controllers\Site;

use App\Controllers\BaseControllers;
use App\Models\comments;
use App\Models\images_background;
use App\Models\patients;

class WorkController extends BaseControllers
{
    public function our_works()
    {
        $background_images = images_background::query()->get();
        $works = patients::query()->get();
        return view('site/includes/our_works',
            ['title' => 'Our Works',
                'background_images' => $background_images,
                'works' => $works
            ], 'layouts/site_layout');

    }

}