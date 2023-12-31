<?php
require 'middleware/Authmiddleware.php';
require 'middleware/Guestmiddleware.php';

class Router
{
    public $route = [];



    public function middlewares($middleware){
        $this->route[count($this->route) - 1]['middleware'] = $middleware;
    }

    public function get($uri,$controllers){

        $this->route[]=[
            'uri' => $uri,
            'controller' => $controllers,
            'method' => 'GET',
            'middleware'=>null
        ];

        return $this;
    }

    public function post($uri,$controllers){

        $this->route[]=[
            'uri' => $uri,
            'controller' => $controllers,
            'method' => 'POST',
            'middleware'=>null
        ];
        return $this;
    }


    public function routes(){
        $arr = [];
        foreach($this->route as $routers){

          
            if($routers['uri'] === $_SERVER['REQUEST_URI']){
        
                if ($routers['middleware'] === 'auth') {
                    $routing = new Authmiddleware();
                    $routing->handler();
                 }
 
                 if ($routers['middleware'] === 'guest') {
                     $routing = new Guestiddleware();
                     $routing->handler();
                  }
                  $arr['controller'] = $routers['controller'];
               
            }
  
        }
        if(empty($arr['controller'])){
             require 'error.php';
          }
          else{
           return $arr['controller'];
          }
}
 
}
