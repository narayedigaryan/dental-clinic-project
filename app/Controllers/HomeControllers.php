<?php

namespace App\Controllers;
use core\Request;
use App\Models\treatments;
use core\View;
use core\Model;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Facades\DB;

class HomeControllers extends BaseControllers
{
    public function test()
    {
        return view('test', ['name' => 'ghj']);
        return "Test page";
    }

    public function contact()
    {
        dump('hello');
        return "Contact page";
    }

    public function admin()
    {
        $treatments = treatments::query()->get();
        return view('admin/includes/admin', [
            'title' => 'Admin page',
            'treatments' => $treatments]);

    }
    public function edit($params)
    {
        $id = $params['id'];
        $treatment = treatments::query()->findOrFail($id);
        return view('admin/includes/update_treatment', ['title' => 'Update page','treatment' => $treatment],'layouts/html_layout');

    }
//
//    public function edit(Request $request, $id)
//    {
//        if (!$id) {
//            throw new \InvalidArgumentException("ID parameter is required.");
//        }
//
//        $treatment = treatments::query()->findOrFail($id);
//
//        return view(
//            'admin/includes/update_treatment',
//            [
//                'title' => 'Update page',
//                'treatment' => $treatment
//            ],
//            'layouts/html_layout'
//        );
//    }
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price_1' => 'required|numeric',
            'price_2' => 'numeric',
        ];

        // Collect data from the request
        $data = $request->all(); // Use the Request's `all` method

        // Use the model's validate method
        $treatment = new treatments();
        if (!$treatment->validate($data, $rules)) {
            // Handle validation errors
            $_SESSION['errors'] = $treatment->errors; // Store errors in session
            $_SESSION['old_input'] = $data;           // Store old input in session
            header("Location: " . $_SERVER['HTTP_REFERER']); // Redirect back
            exit;
        }

        // Find the treatment and update it
        $existingTreatment = treatments::query()->findOrFail($id);
        $existingTreatment->update($data);

        // Redirect with success message
        $_SESSION['success'] = 'Treatment updated successfully!';
        header("Location: " . base_url('/admin')); // Redirect to the admin page
        exit;
    }



    public function destroy($params)
    {
        $id = $params['id'];
        $treatment = treatments::query()->findOrFail($id);
        $treatment->delete();

        //DB::statement("ALTER TABLE treatments AUTO_INCREMENT = (SELECT MAX(id) FROM treatments) + 1");
       //treatments::query()->getConnection()->execute("ALTER TABLE treatments AUTO_INCREMENT = (SELECT MAX(id) FROM treatments) + 1");

        response()->redirect(base_url('/admin'))->with('success', 'Treatment deleted successfully!');
       // return redirect()->route('admin')->with('success', 'Treatment deleted successfully!');
    }
    public function site()
    {
        return view('site/site', ['title' => 'Site page'],'layouts/site_layout');

    }


}