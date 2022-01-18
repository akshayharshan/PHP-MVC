<?php
  /*
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */
  class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
      //print_r($this->getUrl());

      $url = $this->getUrl();

      // Look in controllers for first value
      if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
        // If exists, set as controller
        $this->currentController = ucwords($url[0]);
        // Unset 0 Index
        // unset($url[0]);
        echo '<br>';
        print_r($url);echo 'unset url';
      }

      // Require the controller
      require_once '../app/controllers/'. $this->currentController . '.php';

      // Instantiate controller class
      $this->currentController = new $this->currentController;

      // second part of the url

      if(isset($url[1])){

        if(method_exists($this->currentController,$this->currentMethod)){

          $this->currentMethod = $url;
        }


      }

      $this->params = $url ? array_values($url):[];

      print_r($url);
      echo '<br>';
      print_r($this->params);
    }

    public function getUrl(){
      if(isset($_GET['url'])){
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        print_r($url) ; echo 'get url';
        echo '<br>';
        return $url;
      }
    }
  } 
  
  