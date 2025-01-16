<?php

namespace core;

use Illuminate\Database\Capsule\Manager as Capsule;

class Application
{
    protected string $uri;
    public Request $request;
    public Response $response;
    public Router $router;
    public View $view;
    public Session $session;
    public Cache $cache;
    public static Application $app;
    protected array $container = [];

    public function __construct(){
        self::$app = $this;

        $this->uri = $_SERVER["REQUEST_URI"];
        $this->request = new Request($this->uri);
        $this->response = new Response();
        //Router-ի օբյեկտը ընդունումէ այս երկու պարամետրերը, որովհետև այն անմիջապես աշխատում է երթուղու հետ, եթե այն չի գտնում դիմում է response-ին
        $this->router = new Router($this->request,$this->response);
        $this->view = new View(LAYOUT);
        $this->session = new Session();
        $this->cache = new Cache();
        $this->generateCsrfToken();
        $this->setDbConnection();
    }
    public function run() : void {
        echo $this->router->dispatch();
    }
    public function generateCsrfToken():void
    {
        if(!$this->session->has('csrf_token')){
            session()->set('csrf_token',md5(uniqid(mt_rand(), true)));
        }
    }

    public function setDbConnection()
    {
        $capsule = new Capsule();
        $capsule->addConnection(DB_SETTINGS);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
    public function set($key,$value)
    {
        $this->container[$key] = $value;
    }

    public function get($key, $default = null)
    {
        return $this->container[$key] ?? $default;
    }

}