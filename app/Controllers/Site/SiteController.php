<?php

namespace App\Controllers\Site;

use App\Controllers\BaseControllers;
use App\Models\admins;
use App\Models\comments;
use App\Models\images_background;
use App\Models\treatments;
use App\Models\web_third_part;
use core\Response;

class SiteController extends BaseControllers
{

    public function web_third_part_services($params)
    {
        $id = $params['id'];
        $background_images = images_background::query()->get();
        $service = web_third_part::query()->where('id', $id)->first();


        if (!$service) {
            return response()->setResponseCode('404')->setBody("Service Not Found");
        }

        return view('site/includes/web_third_part_services',
            [
                'title' => 'Services',
                'background_images' => $background_images,
                'service' => $service
            ],
            'layouts/site_layout'
        );
    }
    public function services()
    {
        $background_images = images_background::query()->get();
        $treatments = treatments::query()->get();
        return view('site/includes/services',
            ['title' => 'Services',
                'background_images' => $background_images,
                'treatments' => $treatments
            ], 'layouts/site_layout');

    }

    public function about()
    {
        $background_images = images_background::query()->get();
        $comments = comments::query()
            ->select(['name', 'comment','reply'])
            ->orderBy('id', 'DESC') // Assuming `id` is auto-incremented
            ->limit(2)
            ->get();
        return view('site/includes/about',
            ['title' => 'About',
                'background_images' => $background_images,
                'comments' => $comments
            ], 'layouts/site_layout');

    }
        public function store_comments()
        {
            $model_comments = new comments();
            $model_comments->loadData();
            if (!$model_comments->validate()) {
                session()->setFlash('error', 'validation error');
                session()->set('form_errors', $model_comments->getErrors());
                session()->set('form_data', $model_comments->attributes);
            }
            else {
                if ($model_comments->save()) {
                session()->setFlash('success', 'Service added successfully');
            } else {
                session()->setFlash('error', 'Failed to add service');
            }
            }

            response()->redirect(base_url('/about'));

    }

}