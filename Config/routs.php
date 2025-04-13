<?php
/** @var core\Application $app */
//$app->router->add('/', function(){
//    app()->view->render("admin.php");
//    echo "Welcome to the home page!";
//},['post', 'get']);

use App\Controllers\Admin\AdminController;
use App\Controllers\Site\SiteController;
use App\Controllers\Admin\PatientsController;
use App\Controllers\Admin\WebController;
use App\Controllers\Site\WorkController;
const MIDDLEWARE = [
    'auth'=> \core\Middleware\Auth::class,
    'guest'=> \core\Middleware\Guest::class,
];
$app->router->get('test',[\App\Controllers\HomeControllers::class, 'test']);

$app->router->get( 'contact',[\App\Controllers\HomeControllers::class, 'contact']);
$app->router->get('admin', [\App\Controllers\HomeControllers::class, 'admin']);
$app->router->get('dashboard', [AdminController::class, 'dashboard'])->middleware(['auth']);
$app->router->get('login', [AdminController::class, 'login'],'layouts/html_layout')->middleware(['guest']);
$app->router->post('login', [AdminController::class, 'auth'],'layouts/html_layout')->middleware(['guest']);
$app->router->get('our_works', [WorkController::class, 'our_works'],'layouts/html_layout')->middleware(['guest']);

$app->router->get('register', [AdminController::class, 'register'],'layouts/html_layout')->middleware(['guest']);
$app->router->get('add_new_servicess', [AdminController::class, 'add_new_services'],'layouts/html_layout2');
$app->router->get('background_images', [AdminController::class, 'background_images'],'layouts/html_layout2');
$app->router->get('table_admins', [AdminController::class, 'table_admins'],'layouts/html_layout2');
$app->router->post('register', [AdminController::class, 'store'],'layouts/html_layout')->middleware(['guest']);
$app->router->post('add_new_servicess', [AdminController::class, 'store_services'],'layouts/html_layout');
$app->router->post('background_images', [AdminController::class, 'store_images_background'],'layouts/html_layout');
$app->router->get('add_patient', [PatientsController::class, 'add_patient']);
$app->router->post('add_patient', [PatientsController::class, 'store_patient']);
$app->router->get('search_patient', [PatientsController::class, 'search_patient']);
$app->router->get('admin_comments', [\App\Controllers\Admin\CommentsController::class, 'admin_comments'],'layouts/html_layout2');
$app->router->post('admin_comments', [\App\Controllers\Admin\CommentsController::class, 'store_comments_reply'],'layouts/html_layout');
$app->router->get('web_second_part', [WebController::class, 'web_second_part']);
$app->router->post('web_second_part', [WebController::class, 'store_web_second_part']);
$app->router->get('web_third_part', [WebController::class, 'web_third_part']);
$app->router->post('web_third_part', [WebController::class, 'store_web_third_part']);
$app->router->get('web_third_part_services/{id}', [SiteController::class, 'web_third_part_services'],'layouts/site_layout');

$app->router->get('forgot-password', [AdminController::class, 'forgotPassword'],'layouts/html_layout');
$app->router->get('/', [\App\Controllers\HomeControllers::class, 'index']);
$app->router->get('site', [\App\Controllers\HomeControllers::class,'site'],'layouts/site_layout');
$app->router->get('services', [SiteController::class,'services']);
$app->router->get('about', [SiteController::class,'about']);
$app->router->post('about', [SiteController::class, 'store_comments']);


$app->router->get('update_treatment/{id}', [\App\Controllers\HomeControllers::class, 'edit'],'layouts/html_layout');
$app->router->post('update_treatment/{id}', [\App\Controllers\HomeControllers::class, 'update']);
if (!empty($app->router)) {
    $app->router->post('delete_treatment/{id}', [\App\Controllers\HomeControllers::class, 'destroy']);
    $app->router->post('delete_patient/{id}', [PatientsController::class, 'destroy_patients']);
}

$app->router->get('send_mail',[\App\Controllers\Site\MailController::class,'sendMail'],'layouts/site_layout');
$app->router->post('send_mail',[\App\Controllers\Site\MailController::class,'handleMail'],'layouts/site_layout');




$app->router->get('/post/(?P<slug>[a-z0-9-]+)/?', function(){

    return'<p>Some content</p>';
});
//dump(__LINE__,__FILE__,$app->router->getRoutes());
