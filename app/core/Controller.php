<?php
class Controller {
    public function model($model) {
        try {
            if (file_exists(BASEURL . '/models/' . $model . '.php')) {
                require_once BASEURL . '/models/' . $model . '.php';
                return new $model();
            }
            die("Model Error: Failed to load model $model.");
        } catch (Exception $e) {
            die("Model Error: Failed to load model $model. Details: " . $e->getMessage());
        }
    }

    public function view($view, $data = []) {
        try {
            extract($data);
            if (file_exists(BASEURL . '/views/' . $view . '.php')) {
                require_once BASEURL . '/views/' . $view . '.php';
            } else {
                die("View Error: Failed to load view $view.");
            }
        } catch (Exception $e) {
            die("View Error: Failed to load view $view. Details: " . $e->getMessage());
        }
    }
}
