<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseControllers;
use App\Models\images_background;
use App\Models\patients;
use App\Controllers\Admin\AdminController;
use App\Models\treatments;

class PatientsController extends BaseControllers
{
    public function add_patient()
    {


        return view('admin/includes/add_patient', ['title' => 'Appointments page'], 'layouts/default');

    }
    public function search_patient()
    {
        $patients = patients::query()->get();

        return view('admin/includes/search_patient',
            ['title' => 'Patients page',
                'patients'=>$patients],
            'layouts/default');

    }

    public function store_patient()
    {
        $model = new patients();
        $fileName1='';
        $fileName2='';
        $data = request()->getData();
        // Handle file upload
        if (request()->hasFile('image_name')) {
            $file = request()->file('image_name');

            // Validate the file (Optional: Set validation rules)
            if ($file['error'] === UPLOAD_ERR_OK) {


                $extension = pathinfo($file['full_path'], PATHINFO_EXTENSION);

                // Generate a unique name for the image
                $fileName1 = time() . '.' . $extension;

                // Define the upload path (public/images/background)
                $uploadPath = $this->public_path('images/patients');

                if (move_uploaded_file($file['tmp_name'], $uploadPath . '/' . $fileName1)) {
                    // The image was successfully uploaded
                    echo "File uploaded successfully: " . $fileName1;
                } else {
                    echo "Error moving the file!";
                }
            } else {
                echo "Error uploading the file! Error code: " . $file['error'];


            }
        }

        if (request()->hasFile('image_name2')) {
            $file = request()->file('image_name2');

            // Validate the file (Optional: Set validation rules)
            if ($file['error'] === UPLOAD_ERR_OK) {


                $extension = pathinfo($file['full_path'], PATHINFO_EXTENSION);

                // Generate a unique name for the image
                $fileName2 = time() . '.' . $extension;

                // Define the upload path (public/images/background)
                $uploadPath = $this->public_path('images/patients2');

                if (move_uploaded_file($file['tmp_name'], $uploadPath . '/' . $fileName2)) {
                    // The image was successfully uploaded
                    echo "File uploaded successfully: " . $fileName2;
                } else {
                    echo "Error moving the file!";
                }
            } else {
                echo "Error uploading the file! Error code: " . $file['error'];


            }
        }
        $model->loadData();
        if (!$model->validate()) {
            session()->setFlash('error', 'validation error');
            session()->set('form_errors', $model->getErrors());
            session()->set('form_data', $model->attributes);
        } else {
            $model->attributes['image_name']=$fileName1;
            $model->attributes['image_name2']=$fileName2;
            if ($model->save()) {
                session()->setFlash('success', 'Registration successful');
            } else {

                session()->setFlash('error', 'Registration failed');
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
    public function destroy_patients($params)
    {
        $id = $params['id'];
        $patient = patients::query()->findOrFail($id);
        $patient->delete();


        response()->redirect(base_url('/search_patient'))->with('success', 'Treatment deleted successfully!');

    }

}