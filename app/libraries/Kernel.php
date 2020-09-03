<?php

class Core
{
    // if aren't controller Pages will be loaded.
    protected $currentController = 'Pages';
    // Method 'index will be loaded in 'Pages'
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        //// print_r($this->getUrl());


        $url = $this->getUrl();
        // look in 'controller' and capitalize first letter.

        if (file_exists('../app/controller/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]);
            // Unset 0 Index
            unset($url[0]);
        }


        // Require the controller
        require_once '../app/controller/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;

        // check for the second part of the Url.
        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        // Get parameters
        $this->params = $url ? array_values($url) : [];

        // Callback with params array
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    // get browser Url.
    public function getUrl()
    {
        if (isset($_GET['url'])) {
            // trim '/'.
            $url = rtrim($_GET['url'], '/');
            // removes all illegal URL characters.
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // breaking Url into array.
            $url = explode('/', $url);
            return $url;
        }
    }
}
