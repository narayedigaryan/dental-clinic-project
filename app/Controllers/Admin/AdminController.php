<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseControllers;
use App\Models\admins;
use App\Models\images_background;
use App\Models\treatments;
use core\Pagination;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class AdminController extends BaseControllers
{
    public function register()
    {

       $users = Capsule::table('admins')->get();
//dump($users);
       // $users2 = admins::all();
      //  dump($users2);
        return view('admin/includes/register', ['title' => 'Register'], 'layouts/html_layout');

    }

    public function store()
    {
        $model = new admins();
        $model->loadData();
        if (!$model->validate()) {
            session()->setFlash('error', 'validation error');
            session()->set('form_errors', $model->getErrors());
            session()->set('form_data', $model->attributes);
        }
        else {


            $model->attributes['password'] = trim($model->attributes['password']);
            $user_password = trim($model->attributes['password']);
            $model->attributes['password'] = password_hash($model->attributes['password'], PASSWORD_DEFAULT);
            // Remove repeatpassword from attributes as it is not needed for storage
            unset($model->attributes['repeatpassword']);

            if($model->save()){
                session()->setFlash('success', 'Registration successful');
            }else{
                session()->setFlash('error', 'Registration failed');
            }

        }

        response()->redirect('');
    }

    public function login()
    {
        return view('admin/includes/login', ['title' => 'Login page'], 'layouts/html_layout');
    }

    public function auth()
    {
        $model = new admins();
        $model->loadData();

        // Validate input: email and password are required
        if (!$model->validate($model->attributes, ['required' => ['email', 'password']])) {
            echo json_encode(['status' => 'error', 'message' => $model->getErrors()]);
            die();
        }

        // Fetch user from the database
        $hashing_password = password_hash($model->attributes['password'], PASSWORD_DEFAULT);

        $user = Capsule::table('admins')->where('email', $model->attributes['email'])
            ->where('password', $hashing_password)->first();

        if (!$user) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid email.']);
            die();
        }

        // Debugging: Log the entered password and stored password hash

        // Verify the password against the stored hash
        if (!password_verify($model->attributes['password'], $user->password)) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid password.']);
            die();
        }

        // If password is correct, proceed with login
        session()->set('user_id', $user->id);
        session()->set('user_email', $user->email);
        session()->set('user_name', $user->fname . ' ' . $user->lname);

        // Success response and redirect
        echo json_encode(['status' => 'success', 'message' => 'Login successful']);
        response()->redirect(base_url('/admin'));
    }


    public function forgotPassword()
    {
        return view('admin/includes/forgot-password', ['title' => 'Forgot password page'], 'layouts/html_layout');
    }
    public function dashboard()
    {
        return view('admin/includes/dashboard', ['title' => 'Dashboard page']);

    }
    public function table_admins()
    {
        $users_cnt = admins::count();
        $limit = PAGINATION_SETTINGS['perPage'];
        $pagination = new Pagination($users_cnt,tpl:'pagination/base');


        $admins = admins::query()->limit($limit)->offset($pagination->getOffset())->get();
        return view('admin/includes/table_admins',
            ['title' => 'admins',
                'admins' => $admins,
                'pagination' => $pagination,],
            'layouts/html_layout2');
    }
    public function add_new_services()
    {
        return view('admin/includes/add_new_servicess', ['title' => 'Add new services page'],'layouts/html_layout2');
    }

    public function store_services()
    {
        $model_services = new treatments(); // Use the treatments model
        $model_services->loadData();
        if (!$model_services->validate()) {
            session()->setFlash('error', 'validation error');
            session()->set('form_errors', $model_services->getErrors());
            session()->set('form_data', $model_services->attributes);
        }
        else {

            if($model_services->save()){
                session()->setFlash('success', 'Registration successful');
            }else{
                session()->setFlash('error', 'Registration failed');
            }

        }

        response()->redirect('');
     }
    public function background_images()
    {
        $images = Capsule::table('images_background')->get();
        return view('admin/includes/background_images', ['title' => 'Background images'],'layouts/html_layout2');
    }
    public function store_images_background()
    {
        $model_images = new images_background();
        $this->extracted($model_images);
    }

    /**
     * @param images_background $model_images
     * @return void
     */
    public function extracted(images_background $model_images): void
    {
        $data = request()->getData();
        // Handle file upload
        if (isset($data['image_name']) && request()->hasFile('image')) {
            $file = request()->file('image');

            // Validate the file (Optional: Set validation rules)
            if ($file['error'] === UPLOAD_ERR_OK) {
                // Get the file extension
                $extension = pathinfo($file['full_path'], PATHINFO_EXTENSION);

                // Generate a unique name for the image
                $fileName = time() . '.' . $extension;

                // Define the upload path (public/images/background)
                $uploadPath = $this->public_path('images/background_images');
                move_uploaded_file($file['tmp_name'], $uploadPath . '/' . $fileName);
            }
        }

        $model_images->loadData();
        if (!$model_images->validate()) {
            // Handle validation errors
            session()->setFlash('error', 'Validation error');
            session()->set('form_errors', $model_images->getErrors());
            session()->set('form_data', $model_images->attributes);
        } else {

            if ($model_images->save()) {
                session()->setFlash('success', 'Service added successfully');
            } else {
                session()->setFlash('error', 'Failed to add service');
            }
        }

        response()->redirect('');
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