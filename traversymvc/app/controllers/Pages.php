<?php
  class Pages extends Controller {
    public function __construct(){
     
    }

    public function index(){

      $data = [

        'title'=>'welcome about'
      ];

      $this -> view('Pages/about',$data);
      
      
      
    }

    public function about(){

      $data2 = [

        'title'=>'welcome index'
      ];

      $this -> view('Pages/index',$data2);
    }
  }