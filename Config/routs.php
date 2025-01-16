<?php
/** @var core\Application $app */
//$app->router->add('/', function(){
//    app()->view->render("admin.php");
//    echo "Welcome to the home page!";
//},['post', 'get']);

use App\Controllers\Admin\AdminController;
use App\Controllers\Site\SiteController;
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

$app->router->get('register', [AdminController::class, 'register'],'layouts/html_layout')->middleware(['guest']);
$app->router->get('add_new_servicess', [AdminController::class, 'add_new_services'],'layouts/html_layout2');
$app->router->get('background_images', [AdminController::class, 'background_images'],'layouts/html_layout2');
$app->router->get('table_admins', [AdminController::class, 'table_admins'],'layouts/html_layout2');
$app->router->post('register', [AdminController::class, 'store'],'layouts/html_layout')->middleware(['guest']);
$app->router->post('add_new_servicess', [AdminController::class, 'store_services'],'layouts/html_layout');
$app->router->post('background_images', [AdminController::class, 'store_images_background'],'layouts/html_layout');

$app->router->get('forgot-password', [AdminController::class, 'forgotPassword'],'layouts/html_layout');
$app->router->get('/', [\App\Controllers\HomeControllers::class, 'index']);
$app->router->get('site', [\App\Controllers\HomeControllers::class,'site'],'layouts/site_layout');

$app->router->get('update_treatment/{id}', [\App\Controllers\HomeControllers::class, 'edit'],'layouts/html_layout');
$app->router->post('update_treatment/{id}', [\App\Controllers\HomeControllers::class, 'update']);
if (!empty($app->router)) {
    $app->router->post('delete_treatment/{id}', [\App\Controllers\HomeControllers::class, 'destroy']);
}
$app->router->get('implantation', [SiteController::class, 'implantation'],'layouts/site_layout');
$app->router->get('ortopedia', [SiteController::class, 'ortopedia'],'layouts/site_layout');
$app->router->get('send_mail',[\App\Controllers\Site\MailController::class,'sendMail'],'layouts/site_layout');
$app->router->post('send_mail',[\App\Controllers\Site\MailController::class,'handleMail'],'layouts/site_layout');




$app->router->get('/post/(?P<slug>[a-z0-9-]+)/?', function(){

    return'<p>Some content</p>';
});
//dump(__LINE__,__FILE__,$app->router->getRoutes());
