<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseControllers;
use App\Models\images_background;
use App\Models\patients;
use App\Controllers\Admin\AdminController;
use App\Models\web_second_part;
use App\Models\web_third_part;
use Illuminate\Database\Capsule\Manager as Capsule;


class WebController extends BaseControllers
{
    public function web_second_part()
    {
        $services = Capsule::table('web_second_part')->get();
        return view('admin/includes/web_second_part', ['title' => 'Second part'],'layouts/default');
    }
    public function store_web_second_part()
    {
        $model_web_second_part = new web_second_part();
        $fileName = '';
        $data = request()->getData();
        // Handle file upload
        if (request()->hasFile('image_name')) {
            $file = request()->file('image_name');

            // Validate the file (Optional: Set validation rules)
            if ($file['error'] === UPLOAD_ERR_OK) {


                $extension = pathinfo($file['full_path'], PATHINFO_EXTENSION);

                // Generate a unique name for the image
                $fileName = time() . '.' . $extension;

                // Define the upload path (public/images/background)
                $uploadPath = $this->public_path('images/site_images1');

                if (move_uploaded_file($file['tmp_name'], $uploadPath . '/' . $fileName)) {
                    // The image was successfully uploaded
                    echo "File uploaded successfully: " . $fileName;
                } else {
                    echo "Error moving the file!";
                }
            } else {
                echo "Error uploading the file! Error code: " . $file['error'];


            }
        }
        $model_web_second_part->loadData($data);
        if (!empty($fileName)) {
            $model_web_second_part->attributes['image_name'] = $fileName;
        }
        if (!$model_web_second_part->validate()) {
            session()->setFlash('error', 'validation error');
            session()->set('form_errors', $model_web_second_part->getErrors());
            session()->set('form_data', $model_web_second_part->attributes);
        } else
        {
            if ($model_web_second_part->save()) {
                session()->setFlash('success', 'Registration successful');
            } else {

                session()->setFlash('error', value: 'Registration failed');
            }

        }

        response()->redirect(base_url('/admin'));

    }


    public function web_third_part()
    {
        $services = Capsule::table('web_third_part')->get();
        return view('admin/includes/web_third_part', ['title' => 'Third part'],'layouts/default');
    }
    public function store_web_third_part()
    {
        $model_web_third_part = new web_third_part();
        $fileName = '';
        $data = request()->getData();
        // Handle file upload
        if (request()->hasFile('image_name')) {
            $file = request()->file('image_name');

            // Validate the file (Optional: Set validation rules)
            if ($file['error'] === UPLOAD_ERR_OK) {


                $extension = pathinfo($file['full_path'], PATHINFO_EXTENSION);

                // Generate a unique name for the image
                $fileName = time() . '.' . $extension;

                // Define the upload path (public/images/background)
                $uploadPath = $this->public_path('images/site_images2');

                if (move_uploaded_file($file['tmp_name'], $uploadPath . '/' . $fileName)) {
                    // The image was successfully uploaded
                    echo "File uploaded successfully: " . $fileName;
                } else {
                    echo "Error moving the file!";
                }
            } else {
                echo "Error uploading the file! Error code: " . $file['error'];


            }
        }
        $model_web_third_part->loadData($data);
        if (!empty($fileName)) {
            $model_web_third_part->attributes['image_name'] = $fileName;
        }
        if (!$model_web_third_part->validate()) {
            session()->setFlash('error', 'validation error');
            session()->set('form_errors', $model_web_third_part->getErrors());
            session()->set('form_data', $model_web_third_part->attributes);
        } else
        {
            if ($model_web_third_part->save()) {
                session()->setFlash('success', 'Registration successful');
            } else {

                session()->setFlash('error', value: 'Registration failed');
            }

        }

        response()->redirect(base_url('/admin'));

    }

    public function public_path(string $path = ''): string
    {

        // $publicDir = rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'public';

        $publicDir = rtrim(WWW, DIRECTORY_SEPARATOR);
        if ($path) {
            $publicDir .= DIRECTORY_SEPARATOR . ltrim($path, DIRECTORY_SEPARATOR);
        }

        return $publicDir;
    }

}