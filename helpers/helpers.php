<?php
//օրինակ պետք է կանչել app ֆունկցիան գրվում է հետևյալը
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function app(): \core\Application
{
    return core\Application::$app;
}

//applicationi մեջ var_dump-ը ավելի կարճ գրելու համար այստեղ կանչում ենք նաև request class-ը
function request(): \core\Request
{
    return app()->request;
}

function response(): \core\Response
{
    return app()->response;
}
function session(): \core\Session
{
    return app()->session;
}
function cache(): \core\Cache
{
    return app()->cache;
}

function view($view = '', $data = [], $layout = ''): string|\core\View
{
    if ($view) {
        return app()->view->render($view, $data, $layout);
    }
    return app()->view;
}

function abort($error = '', $code = 404)
{
    response()->setResponseCode($code);
    echo view("errors/{$code}", ['error' => $error], false);
    die;
}

function base_url($path = ''): string
{
    return PATH . $path;
}
function get_alerts():void
{
    if(!empty($_SESSION['flash'])){
        foreach ($_SESSION['flash'] as $key => $value){
            echo view()->renderPartial("incs/alert_{$key}",["flash_{$key}"=>session()->getFlash($key)]);
        }
    }
}
function get_errors($fieldname):string
{
    $output = '';
    $errors = session()->get("form_errors");
    if(isset($errors[$fieldname])){
        $output .= '<div class="invalid-feedback d-block" <ul class="list-unstyled">';
        foreach ($errors[$fieldname] as $error){
            $output .= "<li>{$error}</li>";
        }
        $output .= "</ul></div>";
    }
    return $output;
}
function get_validation_class($fieldname):string
{
$errors = session()->get("form_errors");
if(empty($errors)){
    return "";
}
return isset($errors[$fieldname])? 'is-invalid' : 'is-valid';
}
function old($fieldname):string
{
    return isset(session()->get('form_data')[$fieldname]) ? h(session()->get("form_data")[$fieldname]): '';
}
function h($str):string
{
    return htmlspecialchars($str, ENT_QUOTES);
}
function get_csrf_field():string
{
    return '<input name="csrf_token" type="hidden" value="'.session()->get("csrf_token").'">';
}
function get_csrf_meta():string
{
    return '<meta name="csrf-token" content="'.session()->get("csrf_token").'">';
}
function check_auth():bool
{
    return false;
}
function send_mail(array $to, string $subject, string $tpl, array $data = [], array $attachments = []): bool
{
    $mail = new PHPMailer(true);
    try{
        $mail->SMTPDebug = MAIL_SETTINGS['debug'];
        $mail->isSMTP();
        $mail->Host = MAIL_SETTINGS['host'];
        $mail->SMTPAuth = MAIL_SETTINGS['auth'];
        $mail->Username = MAIL_SETTINGS['username'];
        $mail->Password = MAIL_SETTINGS['password'];
        $mail->SMTPSecure = MAIL_SETTINGS['secure'];
        $mail->Port = MAIL_SETTINGS['port'];

        $mail->setFrom(MAIL_SETTINGS['from_email'], MAIL_SETTINGS['from_name']);

        foreach ($to as $email){
            $mail->addAddress($email);
        }

        if($attachments){
            foreach ($attachments as $attachment){
                $mail->addAttachment($attachment);
            }
        }

        $mail->isHTML(MAIL_SETTINGS['is_html']);
        $mail->CharSet = MAIL_SETTINGS['charset'];
        $mail->Subject = $subject;
        $mail->Body = view($tpl, $data,false);
     return $mail->send();

    }catch (Exception $e){
        error_log("[".date('Y-m-d H:i:s')."] Error:{$e->getMessage()}".PHP_EOL.
            "File:{$e->getFile()}".PHP_EOL."Line:{$e->getLine()}".PHP_EOL.'========='.PHP_EOL, 3,ERROR_LOGS);
        return false;
    }
}