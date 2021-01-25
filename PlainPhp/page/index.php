<?php
    define('__ROOT__', __DIR__);
    require_once('./logic/db_connection.php');
    require_once("./logic/db_wrappers/bs_wrapper.php");

    class Router {
        function __construct() {
            $this->defaultRedirect = 'home';
            $this->db = [];
            $this->sharedData = [];
            $this->onRequest();
            $this->populateVariables();
        }
        
        function setDefaultRedirect($redirect) {
            $this->defaultRedirect = $redirect;
            return $this;
        }

        function onRequest() {
            if(!isset($_GET['page'])) {
                header("Location: ?page={$this->defaultRedirect}");
                die();
            }

            return $this;
        }

        function populateVariables() {
            $this->name = '_main';
            if(isset($_GET['page'])) {
                $this->name = $_GET['page'];
            }

            return $this;
        }

        function loadMain() {
            require(implode('/', [__DIR__, 'views', '_main.php']));
            return $this;
        }

        function setupDatabaseConnection($host, $db, $user, $pass) {
            $this->dbCon = new DbConnection($host, $db, $user, $pass);
            return $this;
        }

        function registerDbWrapper($wrapper, $name) {
            $wrapper->setDbConnection($this->dbCon);
            $this->db[$name] = $wrapper;
            return $this;
        }

        function callController() {
            include(implode('/', [__DIR__, 'controller', "{$this->name}.php"]));
        }

        function shareData($key, $value) {
            $this->sharedData[$key] = $value;
        }

        function dataExists($key) {
            return isset($this->sharedData[$key]);
        }

        function getSharedData($key) {
            if($this->dataExists($key)) {
                return $this->sharedData[$key];
            }
            return "";
        }
    }

    $router = new Router();
    $router->setDefaultRedirect('home')
        ->setupDatabaseConnection("localhost", "school", "root", "")
        ->registerDbWrapper(new BsDbWrapper(), 'bs');

    $method = $_SERVER['REQUEST_METHOD'];
    $router->shareData('METHOD', $method);
    if($method == 'POST') {
        $router->callController();
    } else if($method == 'GET') {
        $router->loadMain();
    }
