<?php
require_once  __DIR__. '/../config/config.php';
require_once ROOT.'/vendor/autoload.php';
require_once HELPERS.'/helpers.php';
$app = new \core\Application();
$whoops = new \Whoops\Run();

if(DEBUG) {

    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
}else{
    $whoops->pushHandler(new \Whoops\Handler\CallbackHandler(function (Throwable $e) {
        error_log("[".date('Y-m-d H:i:s')."] Error:{$e->getMessage()}".PHP_EOL.
            "File:{$e->getFile()}".PHP_EOL."Line:{$e->getLine()}".PHP_EOL.'========='.PHP_EOL, 3,ERROR_LOGS);
    }));
    abort('Some error',500);
}
$whoops->register();

//$app = new \core\Application();
require_once CONFIG_PATH.'/routs.php';

$app->run();
