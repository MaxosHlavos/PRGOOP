<?php

abstract class Model {
    protected $db;
    public function __construct() {
       
    }
}

class Controller {
   
    protected function render($viewName, $data = []) {
        extract($data);
        echo "<nav><a href='/home'>Home</a> | <a href='/kontakt'>Kontakt</a> | <a href='/login'>Login</a></nav><hr>";
        echo "<h1>Stránka: " . ucfirst($viewName) . "</h1>";
        
        
        if ($viewName === 'home') echo "<p>Vítejte na úvodní stránce našeho mini frameworku.</p>";
        if ($viewName === 'kontakt') echo "<p>Napište nám na email@domena.cz</p>";
        if ($viewName === 'login') echo "<form>User: <input><br>Pass: <input type='password'><br><button>Login</button></form>";
    }
}


class HomeController extends Controller {
    public function index() {
        $this->render('home', ['title' => 'Vítejte']);
    }
}

class KontaktController extends Controller {
    public function index() {
        $this->render('kontakt');
    }
}

class LoginController extends Controller {
    public function index() {
        $this->render('login');
    }
}



class Router {
    public function run() {
        
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url = trim($url, '/');

        
        $routes = [
            ''        => [HomeController::class, 'index'],
            'home'    => [HomeController::class, 'index'],
            'kontakt' => [KontaktController::class, 'index'],
            'login'   => [LoginController::class, 'index'],
        ];

        if (isset($routes[$url])) {
            $callback = $routes[$url];
            $controllerName = $callback[0];
            $methodName = $callback[1];

            $controller = new $controllerName();
            $controller->$methodName();
        } else {
            http_response_code(404);
            echo "<h1>404 - Stránka nenalezena</h1><a href='/home'>Zpět domů</a>";
        }
    }
}



$router = new Router();
$router->run();