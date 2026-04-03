<?php
class App {
    protected $controller = 'AuthController';
    protected $method = 'login';
    protected $params = [];

    public function __construct() {
        try {
            $url = $this->parseUrl();

            if ($url && file_exists(BASEURL . '/controllers/' . $url[0] . '.php')) {
                $this->controller = $url[0];
                unset($url[0]);
            }

            require_once BASEURL . '/controllers/' . $this->controller . '.php';
            $this->controller = new $this->controller;

            if (isset($url[1]) && method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }

            $this->params = $url ? array_values($url) : [];

            call_user_func_array([$this->controller, $this->method], $this->params);
        } catch (Exception $e) {
            die("Routing Error: Failed to execute route. Details: " . $e->getMessage());
        }
    }

    public function parseUrl() {
        try {
            if (isset($_GET['url'])) {
                return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            }
            return null;
        } catch (Exception $e) {
            die("URL Error: Failed to parse URL. Details: " . $e->getMessage());
        }
    }
}
