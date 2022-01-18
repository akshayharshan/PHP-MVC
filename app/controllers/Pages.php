<?php
class Pages{

    public function __construct()
    {
        echo 'pages are loaded';
    }

    public function index($id){

        print_r($id);
        
    }
} 
