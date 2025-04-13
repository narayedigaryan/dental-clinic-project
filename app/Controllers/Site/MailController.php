<?php

namespace App\Controllers\Site;
use App\Models\images_background;
use App\Controllers\BaseControllers;

class MailController extends BaseControllers
{
    public function sendMail()
    {
        $background_images = images_background::query()->get();
        return view('site/includes/send_mail',
            ['title'=>'Mail',
                'background_images' => $background_images],
            'layouts/site_layout');
    }

    public function handleMail()
    {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $subject = $_POST['subject'] ?? '';
        $message = $_POST['message'] ?? '';

        if (empty($name) || empty($email) || empty($subject) || empty($message)) {
            return view('site/includes/send_mail', ['title' => 'Mail', 'error' => 'All fields are required.'], 'layouts/site_layout');
        }
        // Send the email
        $sent = send_mail(
            ['nara_e@mail.ru'],
            $subject,
            'site/includes/email_template',
            ['name' => $name, 'email' => $email,'message' => $message]
        );

        if ($sent) {
            return view('site/includes/send_mail', ['title' => 'Mail', 'success' => 'Your message has been sent!'], 'layouts/site_layout');
        } else {
            return view('site/includes/send_mail', ['title' => 'Mail', 'error' => 'Failed to send email.'], 'layouts/site_layout');
        }
    }

}